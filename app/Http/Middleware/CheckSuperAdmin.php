<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié en tant qu'admin
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'superadmin') {
            return $next($request);
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('admin.dashboard')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
    }
}


