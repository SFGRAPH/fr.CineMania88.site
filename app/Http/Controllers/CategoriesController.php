<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Saga;
use App\Models\Product;

class CategoriesController extends Controller
{
    public function show(Request $request, Category $category)
    {
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();
        $sagas = Saga::all();

        $query = Product::where('categories_id', $category->id)
                        ->where('visible', true)
                        ->where('stock', '>', 0);

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('genre') && $request->genre != '') {
            $query->where('genres_id', $request->genre);
        }

        if ($request->has('actor') && $request->actor != '') {
            $query->where('actors_id', $request->actor);
        }

        if ($request->has('director') && $request->director != '') {
            $query->where('directors_id', $request->director);
        }

        if ($request->has('saga') && $request->saga != '') {
            $query->where('sagas_id', $request->saga);
        }

        if ($request->has('price_order') && in_array($request->price_order, ['asc', 'desc'])) {
            $query->orderBy('price', $request->price_order);
        }

        $products = $query->get();

        return view('categories.show', compact('category', 'products', 'genres', 'actors', 'directors', 'sagas'));
    }
}


