<?php

use App\Http\Middleware\CheckAgeMiddleware;
use App\Http\Middleware\LogRequestMiddleware;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            '/orders',
            '/posts'
        ]);

        $middleware->append([
            LogRequestMiddleware::class,
        ]);

        $middleware->alias([
            'age' => CheckAgeMiddleware::class,
            'token' => EnsureTokenIsValid::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
