<?php

namespace Afraa\Http\Controllers\ProgrammeSession;

use Afraa\ProgrammeSession;
use Afraa\FeaturedSession;
use Afraa\Speaker;
use Afraa\Model\Users;
use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProgrammeSessionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$session = \Afraa\ProgrammeSession::paginate(5);
        $sessions = new ProgrammeSession();
        $session = $sessions->getSessions();

        $featured_sessions = new FeaturedSession;

        $featured_session = $featured_sessions->getLatest();

        $role = Auth::user()->role;

        $get_users = new Users();

        $id = Auth::id();

        $users = $get_users->getAllUsers();

        $user_by_id = $get_users->getUserById($id);

        $speakers_list = new Speaker;

        $speakers = $speakers_list->getSpeakerSession();

        $speakers_arr = array();

        foreach ($session as $key => $value) {

           foreach ($speakers as $key => $speakers_value) {
               if ($value->id == $speakers_value->programme_sessions_id) {
                   array_push($speakers_arr, $speakers_value->user_id);
               }
            }

            $value->speakers_array = $speakers_arr;
            $speakers_arr = [];

        }

        //dd($session);

        if ($role == 'admin') {
            return view('layouts.dashboard.admin.session.index',compact('session','featured_session','users','user_by_id'));
        } else {
            return view('layouts.dashboard.delegate.session.index',compact('session','featured_sessions','users','user_by_id'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $role = Auth::user()->role;

        $get_users = new Users();

        $id = Auth::id();

        $get_users = new Users();

        $users = $get_users->getAllUsers();

        $user_by_id = $get_users->getUserById($id);

        if ($role == 'admin') {
            return view('layouts.dashboard.admin.session.create',compact('users','user_by_id'));
        } else {
            //return view('session.create',compact('users'));
        }
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

        $session= new \Afraa\ProgrammeSession;

        $this->validate(
            $request,
            [
                'title' => 'required',
                //'description' => 'required',
                'user_id' => 'required',
                'session_type' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'date' => 'required',

            ]
        );

        $session->title=$request->get('title');
        $session->description=$request->get('description');
        $session->user_id=$request->get('user_id')[0];
        $session->session_type=$request->get('session_type');

        $session->start_time = DATE("H:i", STRTOTIME($request->get('start_time')));
        $session->end_time = DATE("H:i", STRTOTIME($request->get('end_time')));
        $session->date = $request->get('date');

        $session->save();

        $speaker = new Speaker();

        foreach ($request->get('user_id') as $key => $speaker_value) {
            $speaker->saveSpeakers($session->id, $speaker_value, 'asc_8');
        }

        return redirect('dashboard/admin/session')->with('success', 'Information has been added');
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
        $session = \Afraa\ProgrammeSession::find($id);

        $role = Auth::user()->role;

        // $id = Auth::id();

        $get_users = new Users();

        $users = $get_users->getAllUsers();

        $user_by_id = $get_users->getUserById($id);

        if ($role == 'admin') {
            return view('layouts.dashboard.admin.session.edit',compact('session','id','users','user_by_id'));
        } else {
            //return view('session.create',compact('users'));
        }

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
        $session= \Afraa\ProgrammeSession::find($id);

        $session->title=$request->get('title');
        $session->description=$request->get('description');
        $session->user_id=$request->get('user_id');
        $session->session_type=$request->get('session_type');

        $session->start_time = DATE("H:i", STRTOTIME($request->get('start_time')));
        $session->end_time = DATE("H:i", STRTOTIME($request->get('end_time')));
        $session->date = $request->get('date');

        $session->save();

        return redirect()->back()->with('success', 'Information has been updated');
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
        $session = \Afraa\ProgrammeSession::find($id);

        $session->delete();

        return redirect()->back()->with('success','Information has been deleted');
    }
}
