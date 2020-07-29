<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route_name = \Route::currentRouteName();
        if (auth()->user()->checkRole($route_name)) {
            return $next($request);
        }
        return abort(403);
    }
}
