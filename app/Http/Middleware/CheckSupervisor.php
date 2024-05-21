<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSupervisor
{
    /**
     * Handle an incoming request:check if the user is a supervisor admin.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'supervisor_admin') {
            return $next($request);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
