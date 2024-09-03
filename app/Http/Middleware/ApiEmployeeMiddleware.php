<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if(!$user || $user->role != 'admin'||$user->role != 'employee'){
            return response()->json([
                'message' => 'Unauthorized you are not allowed because you are not an admin or employee.'
            ]);
        }
        return $next($request);
    }
}
