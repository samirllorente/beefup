<?php

namespace App\Http\Middleware;

use Closure;

class RoleStudent
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
        if (!$request->user()->hasRole('student')) {
            return redirect('/home');
        }
        return $next($request);
    }
}
