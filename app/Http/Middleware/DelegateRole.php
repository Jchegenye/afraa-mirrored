<?php

namespace Afraa\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DelegateRole
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

            if($role == Auth::user()->role ){

                // echo $role . " ROUTE<br>";
                // echo Auth::user()->role . " DB<br>";

                return $next($request);

            }elseif(Auth::user()->role == 'admin'){
                
                return redirect('/dashboard/admin');

            }elseif(Auth::user()->role == 'manager'){
                
                return redirect('/dashboard/manager');

            }elseif(Auth::user()->role == 'delegate'){
                
                return redirect('/dashboard/delegate');

            }elseif(Auth::user()->role == 'exibitor'){
                
                return redirect('/dashboard/exibitor');

            }elseif(Auth::user()->role == 'author'){
                
                return redirect('/dashboard/author');

            }elseif(Auth::user()->role == 'speaker'){
                
                return redirect('/dashboard/speaker');

            }
            Auth::logout();
            abort(401);

        }
        Auth::logout();
        abort(401);
    }
}
