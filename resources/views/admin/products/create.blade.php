<!-- create.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div id="containerProduct" class="container">
    <h1>Créer un produit</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="formProduct">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="categories_id">Category:</label>
            <select name="categories_id" id="categories_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="genres_id">Genre:</label>
            <select name="genres_id" id="genres_id" class="form-control" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="actors_id">Actor:</label>
            <select name="actors_id" id="actors_id" class="form-control" required>
                @foreach($actors as $actor)
                    <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="directors_id">Director:</label>
            <select name="directors_id" id="directors_id" class="form-control" required>
                @foreach($directors as $director)
                    <option value="{{ $director->id }}">{{ $director->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sagas_id">Saga (Optional):</label>
            <select name="sagas_id" id="sagas_id" class="form-control">
                @foreach($sagas as $saga)
                    <option value="{{ $saga->id }}">{{ $saga->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="image_path">Image:</label>
            <input type="file" name="image_path" id="image_path" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection






