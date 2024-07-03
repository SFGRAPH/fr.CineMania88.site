@extends('layouts.guest')

@section('title', 'Two Factor Challenge')

@section('content')
<div class="container mt-5">
    <h2>Two Factor Challenge</h2>

    <div x-data="{ recovery: false }">
        <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
            {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
        </div>

        <div class="mb-4 text-sm text-gray-600" x-show="recovery">
            {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
        </div>

        <form method="POST" action="{{ route('two-factor.login') }}">
            @csrf

            <div class="form-group mt-3" x-show="! recovery">
                <label for="code">{{ __('Code') }}</label>
                <input id="code" class="form-control" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
            </div>

            <div class="form-group mt-3" x-show="recovery">
                <label for="recovery_code">{{ __('Recovery Code') }}</label>
                <input id="recovery_code" class="form-control" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
            </div>

            <div class="form-group mt-3">
                <button type="button" class="btn btn-link" x-show="! recovery"
                                x-on:click="
                                    recovery = true;
                                    $nextTick(() => { $refs.recovery_code.focus() })
                                ">
                    {{ __('Use a recovery code') }}
                </button>

                <button type="button" class="btn btn-link" x-show="recovery"
                                x-on:click="
                                    recovery = false;
                                    $nextTick(() => { $refs.code.focus() })
                                ">
                    {{ __('Use an authentication code') }}
                </button>

                <button type="submit" class="btn btn-primary">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
