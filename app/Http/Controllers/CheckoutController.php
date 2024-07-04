<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\SumUpService;

class CheckoutController extends Controller
{
    protected $sumUpService;

    public function __construct(SumUpService $sumUpService)
    {
        $this->sumUpService = $sumUpService;
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        Log::debug('Form submission received', $request->all());

        $request->validate([
            'billing_address' => 'required|string',
            'billing_city' => 'required|string',
            'billing_postal_code' => 'required|string',
            'billing_country' => 'required|string',
            'same_as_billing' => 'nullable|boolean',
            'shipping_address' => 'required_if:same_as_billing,false|string|nullable',
            'shipping_city' => 'required_if:same_as_billing,false|string|nullable',
            'shipping_postal_code' => 'required_if:same_as_billing,false|string|nullable',
            'shipping_country' => 'required_if:same_as_billing,false|string|nullable',
        ]);

        Log::debug('Validation passed');

        $cart = session()->get('cart', []);

        if (!is_array($cart) || empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        Log::debug('Total calculated', ['total' => $total]);

        try {
            $payment = $this->sumUpService->createPayment(
                $total,
                'EUR',
                'Order Payment',
                route('checkout.success')
            );

            if (isset($payment['id'])) {
                Log::debug('Payment response', ['response' => $payment]);

                session()->put('order_data', [
                    'cart' => $cart,
                    'billing_address' => $request->billing_address,
                    'billing_city' => $request->billing_city,
                    'billing_postal_code' => $request->billing_postal_code,
                    'billing_country' => $request->billing_country,
                    'same_as_billing' => $request->same_as_billing,
                    'shipping_address' => $request->same_as_billing ? $request->billing_address : $request->shipping_address,
                    'shipping_city' => $request->same_as_billing ? $request->billing_city : $request->shipping_city,
                    'shipping_postal_code' => $request->same_as_billing ? $request->billing_postal_code : $request->shipping_postal_code,
                    'shipping_country' => $request->same_as_billing ? $request->billing_country : $request->shipping_country,
                    'total' => $total,
                ]);

                return redirect()->route('checkout.payment', ['paymentLink' => $payment['id']]);
            }

            return back()->with('error', 'Unable to process payment.');
        } catch (\Exception $e) {
            Log::error('Payment processing failed: ' . $e->getMessage());
            return back()->with('error', 'Payment processing failed: ' . $e->getMessage());
        }
    }

    public function payment($paymentLink)
    {
        return view('checkout.payment', compact('paymentLink'));
    }

    public function success(Request $request)
    {
        Log::debug('Payment success notification received', $request->all());

        $orderData = session()->get('order_data');
        if (!$orderData) {
            return redirect()->route('cart.index')->with('error', 'No order data found in session.');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'received',
            'total' => $orderData['total'],
        ]);

        OrderAddress::create([
            'order_id' => $order->id,
            'address_type' => 'billing',
            'address' => $orderData['billing_address'],
            'city' => $orderData['billing_city'],
            'postal_code' => $orderData['billing_postal_code'],
            'country' => $orderData['billing_country'],
        ]);

        if (!$orderData['same_as_billing']) {
            OrderAddress::create([
                'order_id' => $order->id,
                'address_type' => 'shipping',
                'address' => $orderData['shipping_address'],
                'city' => $orderData['shipping_city'],
                'postal_code' => $orderData['shipping_postal_code'],
                'country' => $orderData['shipping_country'],
            ]);
        }

        foreach ($orderData['cart'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            $product = Product::find($item['id']);
            if ($product) {
                $product->stock -= $item['quantity'];
                if ($product->stock <= 0) {
                    $product->visible = false;
                }
                $product->save();
            }
        }

        session()->forget('cart');
        session()->forget('order_data');

        return view('checkout.success');
    }
}
