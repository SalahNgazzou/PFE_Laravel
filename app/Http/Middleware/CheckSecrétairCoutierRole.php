<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSecrétairCoutierRole
{
    
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->role == 'Secrétaire' || $request->user()->role == 'Courtier')) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
