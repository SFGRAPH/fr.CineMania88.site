<?php

namespace App\Http\Controllers;

use App\Events\OrderProcessing1;
use App\Events\OrderShipped1;
use App\Events\OrderCancelled1;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use App\Models\OrderCancellation;
use App\Models\ReturnProduct;
use App\Models\ArchivedOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReceived;
use App\Mail\OrderProcessing as OrderProcessingMail;
use App\Mail\OrderShipped as OrderShippedMail;
use App\Mail\OrderCompleted as OrderCompletedMail;
use App\Mail\OrderCancelled as OrderCancelledMail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::with('user')->get();
            Log::info('Orders retrieved successfully.', ['orders' => $orders]);
            return view('admin.orders.index', compact('orders'));
        } catch (\Exception $e) {
            Log::error('Error retrieving orders: ' . $e->getMessage());
            return view('admin.orders.index')->with('error', 'Error retrieving orders.');
        }
    }
    
    public function show(Order $order)
    {
        $order->load('items.product', 'billingAddress', 'shippingAddress');
        return view('admin.orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'billing_address' => 'required|array',
            'shipping_address' => 'required|array',
        ]);
    
        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total' => collect($request->items)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            }),
        ]);
    
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
    
        OrderAddress::create([
            'order_id' => $order->id,
            'address_type' => 'billing',
            'address' => $request->billing_address['address'],
            'city' => $request->billing_address['city'],
            'state' => $request->billing_address['state'],
            'postal_code' => $request->billing_address['postal_code'],
            'country' => $request->billing_address['country'],
        ]);
    
        OrderAddress::create([
            'order_id' => $order->id,
            'address_type' => 'shipping',
            'address' => $request->shipping_address['address'],
            'city' => $request->shipping_address['city'],
            'state' => $request->shipping_address['state'],
            'postal_code' => $request->shipping_address['postal_code'],
            'country' => $request->shipping_address['country'],
        ]);
    
        Mail::to($order->user->email)->send(new OrderReceived($order));
    
        return response()->json(['success' => 'Order created successfully.'], 201);
    }
    

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $orders = Order::where(function($queryBuilder) use ($query) {
                            $queryBuilder->where('id', 'like', "%$query%")
                            ->orWhereHas('user', function ($queryBuilder) use ($query) {
                                $queryBuilder->where('name', 'like', "%$query%");
                            })
                            ->orWhere('status', 'like', "%$query%")
                            ->orWhere('total', 'like', "%$query%")
                            ->orWhere('created_at', 'like', "%$query%");
                        })
                        ->latest()
                        ->get();
    
        return view('admin.orders.index', compact('orders'));
    }
    



    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $order->update(['status' => $request->status]);

        if ($request->status == 'processing') {
            event(new OrderProcessing1($order));
            Log::info('Sending OrderProcessing email to ' . $order->user->email);
        }

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }
    


    // séparation des processus de mise à jour de commande et expédition des notifications par mail


    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:received,processing,shipped,completed',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.index')->with('success', 'Le statut à été mis à jour avec succès.');
    }



    public function cancelOrder(Order $order)
    {
        $order->update(['status' => 'cancelled']);
        
        return redirect()->route('admin.orders.index')->with('success', 'Commande annulée avec succès.');
    }



    public function sendProcessingEmail(Order $order)
    {
        Mail::to($order->user->email)->send(new OrderProcessingMail($order));
        Log::info('OrderProcessing email sent to ' . $order->user->email);

        return redirect()->route('admin.orders.index')->with('success', 'Email envoyé avec succès.');
    }



    public function sendShippedEmail(Order $order)
    {
        try {
            Log::info('Sending shipped email to ' . $order->user->email);
            Mail::to($order->user->email)->send(new OrderShippedMail($order));
            return redirect()->back()->with('success', 'Email envoyé avec succès.');
        } catch (\Exception $e) {
            Log::error('Failed to send shipped email: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send shipped email.');
        }
    }
    
    



    public function sendCompletedEmail(Order $order)
    {
        try {
            Mail::to($order->user->email)->send(new OrderCompletedMail($order));
            return redirect()->back()->with('success', 'Email envoyé avec succès.');
        } catch (\Exception $e) {
            Log::error('Failed to send completed email: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send completed email.');
        }
    }



    public function sendCancelledEmail(Order $order)
    {
        try {
            Mail::to($order->user->email)->send(new OrderCancelledMail($order));
            return redirect()->back()->with('success', 'Email envoyé avec succès.');
        } catch (\Exception $e) {
            Log::error('Failed to send cancelled email: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send cancelled email.');
        }
    }


    // 
    
    
    public function getProducts($orderId)
    {
        $orderItems = OrderItem::where('order_id', $orderId)->with('product')->get();
        $returnedQuantities = ReturnProduct::where('order_id', $orderId)
            ->with('products')
            ->get()
            ->flatMap(function ($return) {
                return $return->products->mapWithKeys(function ($product) {
                    return [$product->id => $product->pivot->quantity];
                });
            })
            ->all();

        $products = $orderItems->map(function ($item) use ($returnedQuantities) {
            $returnedQuantity = isset($returnedQuantities[$item->product_id]) ? $returnedQuantities[$item->product_id] : 0;
            return [
                'id' => $item->product_id,
                'name' => $item->product->name,
                'quantity' => $item->quantity,
                'remaining_quantity' => $item->quantity - $returnedQuantity,
            ];
        })->filter(function ($product) {
            return $product['remaining_quantity'] > 0;
        });

        return response()->json(['products' => $products->values()]);
    }

    public function archived()
    {
        $archivedOrders = Order::where('status', 'refunded')->get();
        return view('admin.orders.archived', compact('archivedOrders'));
    }

    public function getOrderProducts($orderId)
    {
        $order = Order::with('products')->findOrFail($orderId);
        return response()->json(['products' => $order->products]);
    }

    public function archivedOrders()
    {
        $archivedOrders = ArchivedOrder::with('user')->get();

        return view('admin.archived-orders.index', compact('archivedOrders'));
    }

    public function showArchivedOrder(ArchivedOrder $archivedOrder)
    {
        $archivedOrder->load('user', 'billingAddress', 'shippingAddress', 'items.product');
        return view('admin.archived-orders.show', compact('archivedOrder'));
    }
}






