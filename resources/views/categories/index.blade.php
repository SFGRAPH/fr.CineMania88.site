@extends('layouts.app')

@section('title', 'Catégorie - ' . $category->name)

@section('content')
<div class="container">
    <h1>Produits de la catégorie {{ $category->name }}</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>{{ $product->price }} €</strong></p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

