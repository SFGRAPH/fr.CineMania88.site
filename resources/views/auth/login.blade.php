@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="container">
    <h2>Login</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
            <input type="checkbox" id="showPassword">Afficher le mot de passe
        </div>

        <div class="form-group mt-3">
            <div class="form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
        </div>

        <div class="form-group mt-3">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Mot de passe oublié?</a>
            @endif
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Login</button>
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
</script>
@endsection
