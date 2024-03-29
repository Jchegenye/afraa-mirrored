<?php

namespace Afraa\Http\Middleware\Roles;

use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ManagerRole
{
    /**
     * Handle an incoming request.
     * 
     * @author Jackson A. Chegenye
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        
        //Compare route given role with recently logged in
        if (!$request->user()->hasRole($role)) {

            if($role == Auth::user()->role){

                // echo $role . " ROUTE<br>";
                // echo Auth::user()->role . " DB<br>";

                return $next($request);

            }
            Auth::logout();
            abort(401);

        }
        Auth::logout();
        abort(401);

    }
}
