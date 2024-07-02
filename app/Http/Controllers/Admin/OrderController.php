<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers\Admin;
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use App\Events\OrderCancelled;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReceived;
use App\Mail\OrderProcessing;
use App\Mail\OrderShipped;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
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

        return response()->json(['success' => 'Order created successfully.']);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $orders = Order::where('is_cancelled', false)
                        ->where(function($queryBuilder) use ($query) {
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

    public function updateStatus(Order $order, $status)
    {
        $order->update(['status' => $status]);

        if ($status == 'processing') {
            Mail::to($order->user->email)->send(new OrderProcessing($order));
        } elseif ($status == 'shipped') {
            Mail::to($order->user->email)->send(new OrderShipped($order));
        } elseif ($status == 'cancelled') {
            event(new OrderCancelled($order));
        }

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }

    public function cancel(Order $order, Request $request)
    {
        $order->update(['status' => 'cancelled', 'is_cancelled' => true]);
        OrderCancellation::create([
            'order_id' => $order->id,
            'reason' => $request->input('reason', 'No reason provided')
        ]);

        event(new \App\Events\OrderCancelled1($order));

        return redirect()->route('admin.orders.index')->with('success', 'Commande annulée avec succès.');
    }

    public function update(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.index')->with('success', 'Statut de la commande mis à jour avec succès.');
    }
}


