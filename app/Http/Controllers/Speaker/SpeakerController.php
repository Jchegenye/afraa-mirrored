<?php

namespace Afraa\Http\Controllers\Speaker;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Afraa\Speaker;
use Afraa\Model\Users;
use Afraa\User;
use Illuminate\Support\Facades\Auth;

class SpeakerController extends Controller
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

        $speakers_list = new Speaker;

        $speakers = $speakers_list->getSpeakers();

        $role = Auth::user()->role;

        $id = Auth::id();

        $get_users = new Users();

        $all_users = \Afraa\User::all();

        $user_by_id = $get_users->getUserById($id);

        return view('layouts.dashboard.speakers.index',compact('speakers','user_by_id','all_users'));

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
        $speakers_list = new Speaker;

        $speakers = $speakers_list->getSpeakerById($id);

        $role = Auth::user()->role;

        $id = Auth::id();

        $get_users = new Users();

        $user_by_id = $get_users->getUserById($id);

        return view('layouts.dashboard.speakers.show',compact('speakers','user_by_id'));
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
    public function destroy()
    {
        //
    }

    public function updateSpeaker($session_id,$user_id)
    {
        //
        $speakers = new Speaker;

        $speakers = $speakers->deleteSpeaker($session_id,$user_id);

        return redirect()->back()->with('success','Information has been deleted');
    }
}
