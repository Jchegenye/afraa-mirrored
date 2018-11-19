<?php

namespace Afraa\Http\Controllers\Delegate;

use Illuminate\Http\Request;
use Afraa\Programme;
use Afraa\ProgrammeSession;
use Afraa\FeaturedSession;
use Afraa\Model\Users;
use Afraa\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DelegateController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();

        $programme_instance = new Programme();

        $programme = $programme_instance->getProgramme($user);

        //dd($programme);

        $session = ProgrammeSession::all();

        $featured_sessions = new FeaturedSession;

        $featured_session = $featured_sessions->getLatest();

        $get_users = new Users();

        $users = $get_users->getAllUsers();

        $user_by_id = $get_users->getUserById($user);

        return view('dashboard/delegate',compact('session','featured_session','programme','user_by_id'));
    }

    public function viewPrograme(){

        return view('layouts/dashboard/delegates/programe');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allDelegates(){

        $get_users = new Users();

        $users = $get_users->getAllDelegates();

        return view('layouts/dashboard/delegate/all',compact('users'));


    }
}
