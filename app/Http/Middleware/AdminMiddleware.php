<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y es administrador
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Si no es admin, muestra error 403 (Acceso denegado)
        abort(403, 'Acceso denegado');
    }
}
