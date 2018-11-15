<?php

namespace Afraa\Http\Controllers\Speaker;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Afraa\Speaker;
use Afraa\Model\Users;
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

        // $sponsors_list = new Speaker;

        // $sponsors = $sponsors_list->getSponsors();

        // $role = Auth::user()->role;

        // $id = Auth::id();

        // $get_users = new Users();

        // $user_by_id = $get_users->getUserById($id);

        //return view('layouts.dashboard.sponsors.index',compact('sponsors','user_by_id'));

        return view('layouts.dashboard.sponsors.index');

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
        $sponsors_list = new Speaker;

        $sponsors = $sponsors_list->getSpeakerById($id);

        $role = Auth::user()->role;

        $id = Auth::id();

        $get_users = new Users();

        $user_by_id = $get_users->getUserById($id);

        return view('layouts.dashboard.sponsors.show',compact('sponsors','user_by_id'));
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
}
