<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReturnProduct;
use App\Models\Order;
use App\Models\RefundProduct;
use App\Mail\ReturnApproved;
use App\Mail\ReturnRejected;
use App\Mail\ReturnRefunded;
use Illuminate\Support\Facades\Mail;

class ReturnController extends Controller
{
    public function index()
    {
        $returns = ReturnProduct::with(['order.user', 'order.items', 'products'])->get();
        return view('admin.returns.index', compact('returns'));
    }

    private function getReturnedQuantities($orderId)
    {
        $returnedQuantities = [];
        $returns = ReturnProduct::where('order_id', $orderId)->with('products')->get();

        foreach ($returns as $return) {
            foreach ($return->products as $product) {
                if (!isset($returnedQuantities[$product->id])) {
                    $returnedQuantities[$product->id] = 0;
                }
                $returnedQuantities[$product->id] += $product->pivot->quantity;
            }
        }

        return $returnedQuantities;
    }

    public function create()
    {
        $orders = Order::where('status', '!=', 'cancelled')->with('items.product')->get();
        return view('admin.returns.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'reason' => 'required|string',
            'status' => 'required|string',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1'
        ]);

        $order = Order::findOrFail($request->order_id);
        $returnedQuantities = $this->getReturnedQuantities($request->order_id);

        foreach ($request->products as $product) {
            $orderItem = $order->items()->where('product_id', $product['id'])->first();
            $totalQuantity = isset($returnedQuantities[$product['id']]) ? $returnedQuantities[$product['id']] + $product['quantity'] : $product['quantity'];

            if (!$orderItem || $totalQuantity > $orderItem->quantity) {
                return redirect()->back()->withErrors(['products' => 'La quantité retournée totale ne peut pas dépasser la quantité commandée.']);
            }
        }

        $return = ReturnProduct::create([
            'order_id' => $request->order_id,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        foreach ($request->products as $product) {
            $return->products()->attach($product['id'], ['quantity' => $product['quantity']]);
        }

        return redirect()->route('admin.returns.index')->with('success', 'Return created successfully.');
    }

    public function show(ReturnProduct $return)
    {
        return view('admin.returns.show', compact('return'));
    }

    public function edit(ReturnProduct $return)
    {
        $orders = Order::where('status', '!=', 'cancelled')->get();
        return view('admin.returns.edit', compact('return', 'orders'));
    }

    public function update(Request $request, ReturnProduct $return)
    {
        $return->update($request->all());
        return redirect()->route('admin.returns.index')->with('success', 'Return updated successfully.');
    }

    public function destroy(ReturnProduct $return)
    {
        $return->delete();
        return redirect()->route('admin.returns.index')->with('success', 'Return deleted successfully.');
    }

    public function approve(ReturnProduct $return)
    {
        foreach ($return->products as $product) {
            $product->increment('stock', $product->pivot->quantity);

            // Check if the product was previously not visible and has stock > 0
            if ($product->stock > 0 && !$product->visible) {
                $product->update(['visible' => true]);
            }
        }
    
        $return->update(['status' => 'approved']);
    
        Mail::to($return->order->user->email)->send(new ReturnApproved($return));
    
        return redirect()->route('admin.returns.index')->with('success', 'Return approved successfully.');
    }

    public function reject(ReturnProduct $return)
    {
        $return->update(['status' => 'rejected']);
    
        Mail::to($return->order->user->email)->send(new ReturnRejected($return));
    
        return redirect()->route('admin.returns.index')->with('success', 'Return rejected successfully.');
    }

    public function refund($id)
    {
        $return = ReturnProduct::findOrFail($id);
    
        $refundAmount = 0;
        foreach ($return->products as $product) {
            $refundAmount += $product->pivot->quantity * $product->price;
        }
    
        $refund = RefundProduct::updateOrCreate(
            ['return_product_id' => $return->id],
            ['amount' => $refundAmount, 'status' => 'processed']
        );
    
        $return->update(['status' => 'refunded']);
    
        Mail::to($return->order->user->email)->send(new ReturnRefunded($return));
    
        return redirect()->route('admin.returns.index')->with('success', 'Remboursement validé avec succès.');
    }

    public function archived()
    {
        $returns = ReturnProduct::where('status', 'refunded')->get();
        return view('admin.returns.archived', compact('returns'));
    }
}
