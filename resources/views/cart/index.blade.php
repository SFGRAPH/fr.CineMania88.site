@extends('layouts.app')

@section('title', 'Panier')

<a class="logoLien" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo" class="logoDashboard"></a>

@section('content')
<div id="panierContainer" class="container">
    <h1>Mon Panier</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(empty($cartItems))
        <p>Votre panier est vide.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }} €</td>
                        <td>
                            <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['stock'] }}">
                                <button type="submit" class="btn btn-secondary">modifier</button>
                            </form>
                        </td>
                        <td>{{ $item['price'] * $item['quantity'] }} €</td>
                        <td>
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Retirer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Passer à la caisse</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Continuer vos achats</a>
        </div>
    @endif
</div>
@endsection
