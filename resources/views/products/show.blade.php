@extends('layouts.app')

@section('title', 'Produit - ' . $product->name)

@section('content')

<div class="logoContainerCat">
    <a href="{{ route('home') }}#carouselAccordeon"><img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo"></a>
</div>

<div id="productContainerShow" class="container">
    <h1>{{ $product->name }}</h1>

    <div class="product-details">

        <div class="imageContainer">
            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="img-thumbnail">
        </div>
        <div class="descriptionContainer">
                <p><strong>Description :</strong><br> {{ $product->description }}</p>
                <p><strong>Prix :</strong><span class="productPrice"> {{ $product->price }} €</span></p>
                <p><strong>Stock :</strong> {{ $product->stock }}</p>

                @if($product->category)
                <p><strong>Catégorie :</strong> {{ $product->category->name }}</p>
                @endif

                @if($product->genre)
                <p><strong>Genre :</strong> {{ $product->genre->name }}</p>
                @endif

                @if($product->actor)
                <p><strong>Acteur :</strong> {{ $product->actor->name }}</p>
                @endif

                @if($product->director)
                <p><strong>Réalisateur :</strong> {{ $product->director->name }}</p>
                @endif

                @if($product->saga)
                <p><strong>Saga :</strong> {{ $product->saga->name }}</p>
                @endif
        </div>        
    </div>
    <a href="{{ route('categories.show', $product->category->id) }}" class="btn btn-primary">Retour à la catégorie</a>
</div>
@endsection





