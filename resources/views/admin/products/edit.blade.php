@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
        </div>

        <div class="form-group">
            <label for="categories_id">Category:</label>
            <select name="categories_id" id="categories_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->categories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="genres_id">Genre:</label>
            <select name="genres_id" id="genres_id" class="form-control">
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $product->genres_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="actors_id">Actor:</label>
            <select name="actors_id" id="actors_id" class="form-control">
                @foreach($actors as $actor)
                    <option value="{{ $actor->id }}" {{ $product->actors_id == $actor->id ? 'selected' : '' }}>{{ $actor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="directors_id">Director:</label>
            <select name="directors_id" id="directors_id" class="form-control">
                @foreach($directors as $director)
                    <option value="{{ $director->id }}" {{ $product->directors_id == $director->id ? 'selected' : '' }}>{{ $director->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sagas_id">Saga:</label>
            <select name="sagas_id" id="sagas_id" class="form-control">
                @foreach($sagas as $saga)
                    <option value="{{ $saga->id }}" {{ $product->sagas_id == $saga->id ? 'selected' : '' }}>{{ $saga->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image_path">Image:</label>
            <input type="file" name="image_path" id="image_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

