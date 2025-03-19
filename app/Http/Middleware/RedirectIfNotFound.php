<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotFound
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $response = $next($request);
        // Verificar si la respuesta es 404
        if ($response->getStatusCode() === 404) {

            return redirect('/error404');  // Cambia '/pagina-no-encontrada' por tu ruta deseada
        }

        return $response;
    }
}
