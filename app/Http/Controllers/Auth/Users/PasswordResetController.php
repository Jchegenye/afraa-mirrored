<?php

namespace Afraa\Http\Controllers\Auth\Users;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;

class PasswordResetController extends Controller
{

    /**
     * Show login page.
     *
     * @author Jackson A. Chegenye
     * @return string
     */
    public function show(){

        return view('auth.users.passwords.reset');

    }
    
}
