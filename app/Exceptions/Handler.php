<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    // Aquí puedes agregar otras funciones según necesites

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return redirect('/admin/login')->with('error', 'Página no encontrada.');
        }

        return parent::render($request, $exception);
    }
}
