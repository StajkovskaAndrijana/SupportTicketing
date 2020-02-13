<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if(!auth()->user()->hasRole($role)) {
            abort(404);
        }

        if($permission !== null && !auth()->user()->can($permission)) {
            abort(404);
        }

        return $next($request);
    }
}
