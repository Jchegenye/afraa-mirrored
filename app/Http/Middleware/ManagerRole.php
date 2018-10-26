<?php

namespace Afraa\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;
use Auth;
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
        if (!$request->user()->hasRole($role)) {

            foreach(Auth::user()->role as $individual_role) {
                if ($role == $individual_role) {
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
        return Lang::has('users.members.unauthorised_access')
            ? Lang::get('users.members.unauthorised_access')
            : 'Unauthorized Access: You are not authorized to access this resource!';
    }

}
