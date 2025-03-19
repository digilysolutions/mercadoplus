<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{



    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            Log::info('Usuario no autenticado, redirigiendo a /login');
            return redirect('/admin/login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        // Obtener el rol del usuario autenticado
        $userRole = $request->user()->role;
        Log::info('Rol del usuario autenticado: ' . $userRole);
        Log::info('Roles permitidos: ' . json_encode($roles)); // Convertimos el arreglo de roles a JSON para mejor lectura en el log

        // Verificar si el rol del usuario está en el arreglo de roles permitidos
        if (!in_array($userRole, $roles)) {
            Log::info('Acceso denegado para el rol: ' . $userRole);
            return redirect('/notaccess');
        }

        return $next($request);
    }
}
