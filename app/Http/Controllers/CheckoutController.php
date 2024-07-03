<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'billing_address' => 'required|string|max:255',
            'billing_city' => 'required|string|max:255',
            'billing_postal_code' => 'required|string|max:10',
            'billing_department' => 'nullable|string|max:255',
            'billing_country' => 'required|string|max:255',
            'shipping_address' => 'nullable|string|max:255',
            'shipping_city' => 'nullable|string|max:255',
            'shipping_postal_code' => 'nullable|string|max:10',
            'shipping_department' => 'nullable|string|max:255',
            'shipping_country' => 'nullable|string|max:255',
        ]);

        $cart = session()->get('cart', []);

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total' => collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            }),
        ]);

        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        OrderAddress::create([
            'order_id' => $order->id,
            'address_type' => 'billing',
            'address' => $request->billing_address,
            'city' => $request->billing_city,
            'postal_code' => $request->billing_postal_code,
            'department' => $request->billing_department,
            'country' => $request->billing_country,
        ]);

        if (!$request->has('same_as_billing')) {
            OrderAddress::create([
                'order_id' => $order->id,
                'address_type' => 'shipping',
                'address' => $request->shipping_address,
                'city' => $request->shipping_city,
                'postal_code' => $request->shipping_postal_code,
                'department' => $request->shipping_department,
                'country' => $request->shipping_country,
            ]);
        } else {
            OrderAddress::create([
                'order_id' => $order->id,
                'address_type' => 'shipping',
                'address' => $request->billing_address,
                'city' => $request->billing_city,
                'postal_code' => $request->billing_postal_code,
                'department' => $request->billing_department,
                'country' => $request->billing_country,
            ]);
        }

        // Créer un PaymentIntent avec Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $paymentIntent = PaymentIntent::create([
            'amount' => $order->total * 100,
            'currency' => 'eur',
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);

        $order->update(['status' => 'processing']);

        return view('checkout.confirm', ['clientSecret' => $paymentIntent->client_secret]);
    }

    public function success()
    {
        return view('checkout.success');
    }
}
