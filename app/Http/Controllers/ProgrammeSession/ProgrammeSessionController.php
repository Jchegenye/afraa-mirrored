<?php

namespace Afraa\Http\Controllers\ProgrammeSession;

use App\ProgrammeSession;
use Afraa\FeaturedSession;
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
        $session = \Afraa\ProgrammeSession::all();

        $featured_sessions = new FeaturedSession;

        $featured_session = $featured_sessions->getLatest();

        $role = Auth::user()->role;

        $get_users = new Users();

        $id = Auth::id();

        $users = $get_users->getAllUsers();

        $user_by_id = $get_users->getUserById($id);

        if ($role == 'admin') {
            return view('layouts.dashboard.admin.session.index',compact('session','featured_session','users','user_by_id'));
        } else {
            return view('session.index',compact('session','featured_sessions','users','user_by_id'));
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

        // if($request->hasfile('featured_image'))
        // {
        //    $file = $request->file('featured_image');
        //    $name=time().$file->getClientOriginalName();
        //    $file->move(public_path().'/images/', $name);
        // }

        $session->title=$request->get('title');
        $session->description=$request->get('description');
        $session->venue=$request->get('venue');
        $session->speaker_id=$request->get('speaker_id');
        $session->moderator_id=$request->get('moderator_id');
        // $session->featured_image = $name;

        $session->start_time = $request->get('start_time');
        $session->end_time = $request->get('end_time');
        $session->date = $request->get('date');

        // $start_time=date_create($request->get('start_time'));
        // $start_time_format = date_format($start_time,"Y-m-d");
        // $programme->start_time = strtotime($start_time_format);

        // $end_time=date_create($request->get('end_time'));
        // $end_time_format = date_format($end_time,"Y-m-d");
        // $programme->end_time = strtotime($end_time_format);

        // $date=date_create($request->get('date'));
        // $format = date_format($date,"Y-m-d");
        // $programme->date = strtotime($format);

        $session->save();

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

        $id = Auth::id();

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
        $session->venue=$request->get('venue');
        $session->speaker_id=$request->get('speaker_id');
        $session->moderator_id=$request->get('moderator_id');

        $session->start_time = $request->get('start_time');
        $session->end_time = $request->get('end_time');
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
