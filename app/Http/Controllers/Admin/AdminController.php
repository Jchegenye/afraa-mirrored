<?php

namespace Afraa\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application (Delegate) dashboard.
     * 
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/admin');
    }

}
