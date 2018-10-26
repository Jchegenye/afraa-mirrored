<?php

namespace Afraa\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Auth;
use Exception;
//use Afraa\Model\Admin\Dashboard\UserPermissions;

class AdminRole
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

        if (!$request->user()->hasRole($role)) {

            foreach(Auth::user()->role as $individual_role) {

                if($role == $individual_role && Auth::user()->uid == 1){
                    return $next($request);
                }
            }

        }

        Session::flash('unauthorised', $this->unauthorisedAccess());
        return redirect()->back();

    }

    /**
     * @author Jackson A. Chegenye
     * @return string
     */
    protected function unauthorisedAccess()
    {
        return Lang::has('users.members.unauthorised')
            ? Lang::get('users.members.unauthorised')
            : 'Unauthorized Access: You are not authorized to access this resource!';
    }
    
}
