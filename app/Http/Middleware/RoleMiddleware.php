<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed 
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect based on roles
        if ($role === 'admin') {
            return redirect()->route('admin.login-form')->with('error', 'Unauthorized access!');
        } elseif ($role === 'user') {
            return redirect()->route('user.login')->with('error', 'Unauthorized access!');
        }

        // Default redirect for other roles
        return redirect('/')->with('error', 'Unauthorized access!');
    }
}
