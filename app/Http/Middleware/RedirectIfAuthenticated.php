<?php

namespace Afraa\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
        if (Auth::guard($guard)->check() && Auth::user()->role == 'admin') {

            return redirect('/dashboard/admin');

        }elseif((Auth::guard($guard)->check() && Auth::user()->role == 'delegate')){

            return redirect('/dashboard/delegate');

        }

        return $next($request);
    }
}
