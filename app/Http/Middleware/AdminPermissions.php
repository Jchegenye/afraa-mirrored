<?php

namespace Afraa\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPermissions
{

    /**
     * Handle an incoming lounge permissions request.
     *
     * @author Jackson A. Chegenye
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {

        if (!$request->user()->hasRole($permission)) {

            //Compare given route permission with recently logged in from DB
            $jsonPermissions = json_decode(Auth::user()->permission);

            if (in_array($permission, $jsonPermissions ) && Auth::user()->role == "admin")
            {

                return $next($request);
                //echo "Match found";

            }else{

                Auth::logout();
                abort(401);
            }

        }

    }

}
