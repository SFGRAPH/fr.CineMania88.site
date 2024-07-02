<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;


class AdminController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Gérer la soumission du formulaire de connexion
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->route('admin.login')->withErrors('Identifiants invalides');
        }
    }

    // Déconnexion de l'administrateur
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // Afficher le tableau de bord
    public function index()
    {
        // Récupère les commandes avec le statut "received"
        $receivedOrders = Order::where('status', 'received')->with('user')->get();

        return view('admin.dashboard', compact('receivedOrders'));
    }

    // Afficher le formulaire de création d'administrateur
    public function create()
    {
        return view('admin.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:administrateurs',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = new Admin([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $admin->save();

        return redirect()->route('admin.dashboard')->with('success', 'Administrateur créé avec succès');
    }
}




