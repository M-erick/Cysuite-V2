<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        // check if user is authenticated
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();

        $roles = [
            'supervisor_admin' => 3,
            'normal_admin' =>2,
            'guest'=>1
        ];


        if ($user->role_id !== $roles[$role]) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }
        return $next($request);
    }
}
