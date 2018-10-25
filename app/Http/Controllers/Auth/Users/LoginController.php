<?php

namespace Afraa\Http\Controllers\Auth\Users;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    /**
     * Show login page.
     *
     * @author Jackson A. Chegenye
     * @return string
     */
    public function show(){

        return view('auth.users.login');

    }

}
