<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin' || $user->role === 'employee') { 
                 return $next($request);
            } elseif ($user->role === 'member') {
                return redirect('/Library');
            } else {
                return redirect('/home'); // في حال كان الدور غير معروف أو لا يوجد دور
            }
        }
      
    }
}
