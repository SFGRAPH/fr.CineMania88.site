<?php

// App\Http\Controllers\ProductsController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(Product $product)
    {
        // Charger les relations nécessaires pour afficher le produit
        $product->load('category', 'genre', 'actor', 'director', 'saga');

        return view('products.show', compact('product'));
    }
}

