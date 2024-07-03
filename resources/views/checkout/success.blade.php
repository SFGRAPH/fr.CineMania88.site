@extends('layouts.app')

@section('title', 'Paiement Réussi')

@section('content')
<div class="container">
    <h1>Paiement Réussi</h1>
    <p>Merci pour votre commande. Votre paiement a été accepté.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
</div>
@endsection
