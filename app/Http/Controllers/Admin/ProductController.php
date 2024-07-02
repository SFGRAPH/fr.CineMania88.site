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

class ProductController extends Controller
{
    // Afficher la liste des produits avec possibilité de filtrage
    public function index(Request $request)
    {
        $categories = Category::all();
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();
        $sagas = Saga::all();

        $searchTerm = $request->input('search');
        $categoryId = $request->input('category');
        $genreId = $request->input('genre');
        $actorId = $request->input('actor');
        $directorId = $request->input('director');
        $sagaId = $request->input('saga');

        $productsQuery = Product::query();

        // Filtrage par catégorie
        if ($categoryId) {
            $productsQuery->where('categories_id', $categoryId);
        }

        // Filtrage par genre
        if ($genreId) {
            $productsQuery->where('genres_id', $genreId);
        }

        // Filtrage par acteur
        if ($actorId) {
            $productsQuery->where('actors_id', $actorId);
        }

        // Filtrage par réalisateur
        if ($directorId) {
            $productsQuery->where('directors_id', $directorId);
        }

        // Filtrage par saga
        if ($sagaId) {
            $productsQuery->where('sagas_id', $sagaId);
        }

        // Recherche globale sur plusieurs colonnes
        if ($searchTerm) {
            $productsQuery->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhereHas('category', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('genre', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('actors', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('directors', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('saga', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    });
            });
        }

        $products = $productsQuery->get();

        return view('admin.products.index', compact('products', 'categories', 'genres', 'actors', 'directors', 'sagas', 'searchTerm', 'categoryId', 'genreId', 'actorId', 'directorId', 'sagaId'));
    }

    // Afficher le formulaire de création de produit
    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();
        $sagas = Saga::all();

        return view('admin.products.create', compact('categories', 'genres', 'actors', 'directors', 'sagas'));
    }

    // Gérer la soumission du formulaire de création de produit
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
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->categories_id = $request->input('categories_id');
        $product->genres_id = $request->input('genres_id');
        $product->actors_id = $request->input('actors_id');
        $product->directors_id = $request->input('directors_id');
        $product->sagas_id = $request->input('sagas_id');

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $product->image_path = 'images/' . $imageName;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produit créé avec succès.');
    }

    // Afficher les détails d'un produit
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    // Afficher le formulaire d'édition d'un produit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();
        $sagas = Saga::all();

        return view('admin.products.edit', compact('product', 'categories', 'genres', 'actors', 'directors', 'sagas'));
    }

    // Gérer la soumission du formulaire de modification d'un produit
    public function update(Request $request, $id)
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

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->categories_id = $request->input('categories_id');
        $product->genres_id = $request->input('genres_id');
        $product->actors_id = $request->input('actors_id');
        $product->directors_id = $request->input('directors_id');
        $product->sagas_id = $request->input('sagas_id');

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $product->image_path = 'images/' . $imageName;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprimer un produit
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Suppression de l'image si elle existe
        if ($product->image_path) {
            $imagePath = public_path($product->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès.');
    }
}




