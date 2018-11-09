<?php

namespace Afraa\Http\Controllers\Programme;

use App\Programme;
use Afraa\Model\Users;
use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programme = \Afraa\Programme::all();

        return view('programme.index',compact('programme'));
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

        return view('programme.create',compact('users'));
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
        $programme= new \Afraa\Programme;

        $user = Auth::user();

        $user_id = Auth::id();

        $programme->user_id = $user_id;
        $programme->session_id = $request->get('session_id');

        $programme->save();

        return redirect()->back()->with('success', 'Information has been added');
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
        $programme = \Afraa\Programme::find($id);

        $get_users = new Users();

        $users = $get_users->getAllUsers();

        return view('programme.edit',compact('programme','id','users'));
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
        $programme= \Afraa\Programme::find($id);

        $programme->title=$request->get('user_id');
        $programme->description=$request->get('session_id');

        $programme->save();

        return redirect('programme');
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
        $programme = \Afraa\Programme::find($id);
        $programme->delete();
        return redirect('dashboard/delegate')->with('success','Information has been deleted');
    }
}
