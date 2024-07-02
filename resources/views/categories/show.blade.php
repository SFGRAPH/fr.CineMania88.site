@extends('layouts.app')

@section('title','CinéMania88 - ' . $category->name)

@section('content')

<div class="logoContainerCat">
    <a href="{{ route('home')}}#carouselAccordeon"><img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo"></a>
</div>


<div id="categoryContainerShow" class="container">


    <h1>{{ $category->name }}</h1>

    <form action="{{ route('categories.show', $category->id) }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="genre">Genre :</label>
                    <select name="genre" id="genre" class="form-control">
                        <option value="">Tous les genres</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ $genre->id == request('genre') ? 'selected' : '' }}>
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="actor">Acteur :</label>
                    <select name="actor" id="actor" class="form-control">
                        <option value="">Tous les acteurs</option>
                        @foreach($actors as $actor)
                            <option value="{{ $actor->id }}" {{ $actor->id == request('actor') ? 'selected' : '' }}>
                                {{ $actor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="director">Réalisateur :</label>
                    <select name="director" id="director" class="form-control">
                        <option value="">Tous les réalisateurs</option>
                        @foreach($directors as $director)
                            <option value="{{ $director->id }}" {{ $director->id == request('director') ? 'selected' : '' }}>
                                {{ $director->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="saga">Saga :</label>
                    <select name="saga" id="saga" class="form-control">
                        <option value="">Toutes les sagas</option>
                        @foreach($sagas as $saga)
                            <option value="{{ $saga->id }}" {{ $saga->id == request('saga') ? 'selected' : '' }}>
                                {{ $saga->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="search">Recherche :</label>
                    <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Nom du produit, catégorie, genre, acteur, réalisateur, saga">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price_order">Trier par prix :</label>
                    <select name="price_order" id="price_order" class="form-control">
                        <option value="">Sélectionner</option>
                        <option value="asc" {{ request('price_order') == 'asc' ? 'selected' : '' }}>Prix croissant</option>
                        <option value="desc" {{ request('price_order') == 'desc' ? 'selected' : '' }}>Prix décroissant</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Filtrer</button>
    </form>

    <div class="products">
        @foreach($products as $product)
            <div class="product">
                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="img-thumbnail">
                <h4></h4>
                <p>{{ $product->name }} - {{ $product->description }}</p>
                <p><strong class="price">{{ $product->price }} €</strong></p>
                <a href="{{ route('products.show', $product) }}" class="btn cards">Voir le produit</a>
            </div>
        @endforeach
    </div>
</div>
@endsection



