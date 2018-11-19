<?php

namespace Afraa\Http\Middleware\Permissions;

use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AllPermissions
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
            if (in_array($permission, Auth::user()->permissions) && Auth::user()->role == "admin")
            {

                return $next($request);

            }
            elseif(in_array($permission, Auth::user()->permissions) && Auth::user()->role == "delegate"){

                return $next($request);
                
            }
            elseif(in_array($permission, Auth::user()->permissions) && Auth::user()->role == "exibitor"){

                return $next($request);
                
            }
            elseif(in_array($permission, Auth::user()->permissions) && Auth::user()->role == "speaker"){

                return $next($request);
                
            }
            elseif(in_array($permission, Auth::user()->permissions) && Auth::user()->role == "author"){

                return $next($request);
                
            }
            Auth::logout();
            abort(401);

        }
        Auth::logout();
        abort(401);

    }

}
