<?php

use App\Domain\ValueObject\Http\HttpCode;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Domain\Exception\Http\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (Exception $e) {

            $statusCode = HttpCode::INTERNAL_SERVER_ERROR->value;
            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode();
            }

            return response()->json([
                'error' => $e->getMessage(),
            ], $statusCode);
        });
    })->create();
