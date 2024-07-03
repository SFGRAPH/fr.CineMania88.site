@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Commande #{{ $order->id }}</h1>

    <div class="card mb-3">
        <div class="card-header">
            Détails de la commande
        </div>
        <div class="card-body">
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Total:</strong> {{ $order->total }}</p>
            <p><strong>Date de commande:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Informations client
        </div>
        <div class="card-body">
            <p><strong>Nom:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Adresse de facturation
        </div>
        <div class="card-body">
            @if ($order->billingAddress)
                <p>{{ $order->billingAddress->address }}</p>
                <p>{{ $order->billingAddress->city }}, {{ $order->billingAddress->postal_code }}</p>
                <p>{{ $order->billingAddress->country }}</p>
            @else
                <p>Aucune adresse de facturation fournie.</p>
            @endif
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Adresse de livraison
        </div>
        <div class="card-body">
            @if ($order->shippingAddress)
                <p>{{ $order->shippingAddress->address }}</p>
                <p>{{ $order->shippingAddress->city }}, {{ $order->shippingAddress->postal_code }}</p>
                <p>{{ $order->shippingAddress->country }}</p>
            @else
                <p>Aucune adresse de livraison fournie.</p>
            @endif
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Produits
        </div>
        <div class="card-body">
            <table id="orderItems" class="table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }} €</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Retour</a>
@endsection


