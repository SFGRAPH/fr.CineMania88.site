@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
<div class="container">
    <h2>Reset Password</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" required autofocus>
        </div>

        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
            <input type="checkbox" id="showPassword">Afficher le mot de passe
        </div>

        <div class="form-group mt-3">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <input type="checkbox" id="showPasswordConfirmation">Afficher la confirmation mot de passe
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Réinitialisez le mot de passe</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('showPassword').addEventListener('change', function() {
        var passwordInput = document.getElementById('password');
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });

    document.getElementById('showPasswordConfirmation').addEventListener('change', function() {
        var passwordConfirmationInput = document.getElementById('password_confirmation');
        if (this.checked) {
            passwordConfirmationInput.type = 'text';
        } else {
            passwordConfirmationInput.type = 'password';
        }
    });
</script>
@endsection

