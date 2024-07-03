<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class PublicVerifyEmailController extends Controller
{
    use VerifiesEmails;

    public function show()
    {
        return view('auth.verify-email');
    }
}
