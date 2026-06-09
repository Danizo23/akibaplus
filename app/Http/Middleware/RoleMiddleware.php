<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user()) {
            throw new AuthenticationException();
        }

        $allowedRoles = preg_split('/[\|,]/', $role, flags: PREG_SPLIT_NO_EMPTY);

        if (! in_array($request->user()->role, $allowedRoles, true)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
