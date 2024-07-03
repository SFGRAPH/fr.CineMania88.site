@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group mt-3 password-container">
            <label for="password">Password</label>
            <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary toggle-password">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group mt-3 password-container">
            <label for="password_confirmation">Confirm Password</label>
            <div class="input-group">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary toggle-password">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        <div class="form-group mt-3">
            <a href="{{ route('login') }}">Already registered?</a>
        </div>
    </form>
</div>
@endsection

