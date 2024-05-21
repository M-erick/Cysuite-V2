<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGuestAccess
{
    /**
     * Handle an incoming request.
     *restrict access to certain areas of your application based on the guest's linked rooms or areas.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $roomId)
    {
        $guest = $request->user();

        if ($guest && $guest->room_id == $roomId) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
