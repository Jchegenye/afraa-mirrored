<?php

namespace Afraa\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;

class ManagePermissionsController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @author Jackson A. Chegenye
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the permissions dashboard.
     *
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.dashboard.admin.permissions');
    }
}
