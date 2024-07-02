<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Saga;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();
        $sagas = Saga::all();
        return view('admin.products.create', compact('categories', 'genres', 'actors', 'directors', 'sagas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'categories_id' => 'required|exists:categories,id',
            'genres_id' => 'required|exists:genres,id',
            'actors_id' => 'required|exists:actors,id',
            'directors_id' => 'required|exists:directors,id',
            'sagas_id' => 'nullable|exists:sagas,id',
            'image_path' => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->genre_id = $request->genre_id;
        $product->actor_id = $request->actor_id;
        $product->director_id = $request->director_id;
        $product->saga_id = $request->saga_id;

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('products', 'public');
            $product->image_path = $path;
        }

        $product->save();

        return redirect()->route('admin.dashboard')->with('success', 'Product created successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}


