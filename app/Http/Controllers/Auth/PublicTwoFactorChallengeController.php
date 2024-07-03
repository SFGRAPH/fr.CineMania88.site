<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicTwoFactorChallengeController extends Controller
{
    public function showChallengeForm()
    {
        return view('auth.two-factor-challenge');
    }

    public function store(Request $request)
    {
        // Logic for handling the two-factor challenge
    }
}
