<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class PublicConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    public function showConfirmForm()
    {
        return view('auth.confirm-password');
    }
}
