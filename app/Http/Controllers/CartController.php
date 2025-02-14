<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
    
        $cartItems = [];
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if ($product) {
                $cartItems[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                    'stock' => $product->stock,
                ];
            }
        }
    
        return view('cart.index', ['cartItems' => $cartItems]);
    }
    
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$product->id])) {
            if ($cart[$product->id]['quantity'] < $product->stock) {
                $cart[$product->id]['quantity']++;
            } else {
                return redirect()->route('cart.index')->with('error', 'Quantité maximale atteinte pour ce produit.');
            }
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'stock' => $product->stock,
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier.');
    }
    
    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }
    
    public function update(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity');
    
        if ($quantity > $product->stock) {
            return redirect()->route('cart.index')->with('error', 'Quantité demandée supérieure au stock disponible.');
        }
    
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $quantity;
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Quantité mise à jour.');
    }
    
}
