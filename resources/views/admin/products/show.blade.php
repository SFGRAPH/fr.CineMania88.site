<!-- resources/views/admin/products/show.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Details des Produits </h1>

            <div class="contenuContainer">

                <div class="decriptifContainer">
                        <div>
                            <strong>Name:</strong> {{ $product->name }}
                        </div>
                        <div>
                            <strong>Description:</strong> {{ $product->description }}
                        </div>
                        <div>
                            <strong>Price:</strong> {{ $product->price }}
                        </div>
                        <div>
                            <strong>Stock:</strong> {{ $product->stock }}
                        </div>
                        <div>
                            <strong>Category:</strong> {{ $product->category->name }}
                        </div>
                        <div>
                            <strong>Genre:</strong> {{ $product->genre->name }}
                        </div>
                        <div>
                            <strong>Actor:</strong> {{ $product->actor->name }}
                        </div>
                        <div>
                            <strong>Director:</strong> {{ $product->director->name }}
                        </div>
                        @if ($product->saga)
                            <div>
                                <strong>Saga:</strong> {{ $product->saga->name }}
                            </div>
                        @endif
                </div>

                <div class="imageContainer">

                        @if ($product->image_path)
                            <div>
                                <!-- <strong>Image:</strong> -->
                                <img src="{{ asset($product->image_path) }}" alt="Product Image" style="max-width: 300px;">
                            </div>
                        @endif
                        
                </div>

            </div>

        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Retour</a>

    </div>

@endsection

