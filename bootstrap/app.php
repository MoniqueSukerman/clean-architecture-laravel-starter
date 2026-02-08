<?php

use App\Domain\Common\Exception\Http\HttpException;
use App\Domain\Common\ValueObject\Http\HttpCode;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (Exception $e) {

            $statusCode = HttpCode::INTERNAL_SERVER_ERROR->value;

            if ($e instanceof ValidationException) {
                Log::error('Erro de validação: ' . $e->getMessage());
                return response()->json($e->getMessage(), $e->status);
            }

            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode();
            }

            Log::error('Erro: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage(),
            ], $statusCode);
        });
    })->create();
