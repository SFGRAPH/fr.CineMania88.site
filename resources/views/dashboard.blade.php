<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Tableau de bord')


        <a class="logoLien" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo" class="logoDashboard"></a>


@section('content')



<div id="userDashboard" class="container">
    <h1>Bienvenue sur votre tableau de bord</h1>
    <p>Utilisez les liens ci-dessous pour gérer vos commandes, vos informations personnelles et bien plus encore.</p>
    <!-- Ajoutez ici des liens vers les différentes fonctionnalités du tableau de bord -->
</div>
@endsection
