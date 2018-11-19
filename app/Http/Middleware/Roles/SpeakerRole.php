<?php

namespace Afraa\Http\Middleware\Roles;

use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SpeakerRole
{

    /**
     * Handle an incoming lounge request.
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

            }else{

                return redirect('/lounge');

            }
            Auth::logout();
            abort(401);

        }
        Auth::logout();
        abort(401);

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
