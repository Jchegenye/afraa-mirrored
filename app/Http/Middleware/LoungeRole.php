<?php

namespace Afraa\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoungeRole
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

            if($role == Auth::user()->role ){

                // echo $role . " ROUTE<br>";
                // echo Auth::user()->role . " DB<br>";

                return $next($request);

            }elseif(Auth::user()->role == 'admin'){
                
                return redirect('/admin');

            }elseif(Auth::user()->role == 'manager'){
                
                return redirect('/manager');

            }elseif(Auth::user()->role == 'delegate'){
                
                return redirect('/delegate');

            }elseif(Auth::user()->role == 'exibitor'){
                
                return redirect('/exibitor');

            }elseif(Auth::user()->role == 'author'){
                
                return redirect('/author');

            }elseif(Auth::user()->role == 'speaker'){
                
                return redirect('/speaker');

            }
            Auth::logout();
            abort(401);

        }
        Auth::logout();
        abort(401);

    }

}
