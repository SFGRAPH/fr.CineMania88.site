@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Détails du retour #{{ $return->id }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($return->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Raison du retour: {{ $return->reason }}</p>
    <p>Statut: {{ $return->status }}</p>

    <a href="{{ route('admin.returns.index') }}" class="btn btn-primary">Retour à la liste</a>
</div>
@endsection


