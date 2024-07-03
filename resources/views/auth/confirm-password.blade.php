@extends('layouts.guest')

@section('title', 'Confirm Password')

@section('content')
<div class="container mt-5">
    <h2>Confirm Password</h2>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" autofocus>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
    </form>
</div>
@endsection
