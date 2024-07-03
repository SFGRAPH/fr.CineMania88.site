@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')
<div class="container mt-5">
    <h2>Mot de passe oublié</h2>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Mot de passe oublié? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Lien de réinitialisation</button>
        </div>
    </form>
</div>
@endsection
