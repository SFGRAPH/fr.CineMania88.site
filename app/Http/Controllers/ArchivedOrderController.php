<?php

namespace App\Http\Controllers;

use App\Models\ArchivedOrder;
use Illuminate\Http\Request;

class ArchivedOrderController extends Controller
{
    public function index()
    {
        $archivedOrders = ArchivedOrder::with('user')->paginate(10);
        return view('admin.archived-orders.index', compact('archivedOrders'));
    }

    public function show(ArchivedOrder $archivedOrder)
    {
        $archivedOrder->load('user', 'billingAddress', 'shippingAddress', 'items.product');
        return view('admin.archived-orders.show', compact('archivedOrder'));
    }
}
