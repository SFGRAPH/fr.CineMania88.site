@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.products.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category">Catégorie :</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $categoryId ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="genre">Genre :</label>
                    <select name="genre" id="genre" class="form-control">
                        <option value="">Tous les genres</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $genre->id == $genreId ? 'selected' : '' }}>
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
                        <option value="{{ $actor->id }}" {{ $actor->id == $actorId ? 'selected' : '' }}>
                            {{ $actor->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="director">Réalisateur :</label>
                    <select name="director" id="director" class="form-control">
                        <option value="">Tous les réalisateurs</option>
                        @foreach($directors as $director)
                        <option value="{{ $director->id }}" {{ $director->id == $directorId ? 'selected' : '' }}>
                            {{ $director->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="saga">Saga :</label>
                    <select name="saga" id="saga" class="form-control">
                        <option value="">Toutes les sagas</option>
                        @foreach($sagas as $saga)
                        <option value="{{ $saga->id }}" {{ $saga->id == $sagaId ? 'selected' : '' }}>
                            {{ $saga->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="search">Recherche :</label>
                    <input type="text" name="search" id="search" class="form-control" value="{{ $searchTerm }}" placeholder="Nom du produit, catégorie, genre, acteur, réalisateur, saga">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Filtrer</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
