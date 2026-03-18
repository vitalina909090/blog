<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{

    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('X-App-Token');

        $validToken = config('app.api_token');

        if ($token !== $validToken) {
            return response()->json([
                'success' => false,
                'error' => 'Неверный токен',
                'message' => 'Ваш токен не совпадает с действительным токеном',
            ], 401);
        }

        return $next($request);
    }
}
