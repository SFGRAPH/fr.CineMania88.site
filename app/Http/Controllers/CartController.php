<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart($productId)
    {
        $cartItem = new CartItem();
        $cartItem->user_id = Auth::id();
        $cartItem->product_id = $productId;
        $cartItem->quantity = 1;
        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function buyNow($productId)
    {
        // Logique pour l'achat direct
    }
}
