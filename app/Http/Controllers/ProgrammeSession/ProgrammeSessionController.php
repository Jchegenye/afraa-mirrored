<?php

namespace Afraa\Http\Controllers\ProgrammeSession;

use App\ProgrammeSession;
use Afraa\Model\Users;
use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;

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

        return view('session.index',compact('session'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $get_users = new Users();

        $users = $get_users->getAllUsers();

        return view('session.create',compact('users'));
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

        if($request->hasfile('featured_image'))
        {
           $file = $request->file('featured_image');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/images/', $name);
        }

        $session->title=$request->get('title');
        $session->description=$request->get('description');
        $session->venue=$request->get('venue');
        $session->speaker_id=$request->get('speaker_id');
        $session->moderator_id=$request->get('moderator_id');
        $session->featured_image = $name;

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

        return redirect('session')->with('success', 'Information has been added');
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

        $get_users = new Users();

        $users = $get_users->getAllUsers();

        return view('session.edit',compact('session','id','users'));
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

        return redirect('session');
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
        return redirect('session')->with('success','Information has been deleted');
    }
}
