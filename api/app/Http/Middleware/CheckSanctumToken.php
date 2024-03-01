<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSanctumToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        // Check if the request is missing a Sanctum token

        if ($request->expectsJson()) {
            return null;
        } else {
            return response()->json(['error' => 'No token provided.'], 401);
        }
    }
}
