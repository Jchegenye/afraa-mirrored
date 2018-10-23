<?php

namespace Afraa\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;

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
        $programme = \App\Programme::all();
        return view('index',compact('programme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
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
        $programme= new \App\Programme;

        $programme->title=$request->get('title');
        $programme->description=$request->get('description');
        $programme->venue=$request->get('venue');
        $programme->speaker_id=$request->get('speaker_id');
        $programme->moderator_id=$request->get('moderator_id');

        $start_time=date_create($request->get('start_time'));
        $start_time_format = date_format($start_time,"Y-m-d");
        $programme->start_time = strtotime($start_time_format);

        $end_time=date_create($request->get('end_time'));
        $end_time_format = date_format($end_time,"Y-m-d");
        $programme->end_time = strtotime($end_time_format);

        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $programme->date = strtotime($format);

        $programme->save();

        return redirect('programme')->with('success', 'Information has been added');
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
        $programme = \App\Programme::find($id);
        return view('edit',compact('programme','id'));
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
        $programme= \App\Programme::find($id);

        $programme->title=$request->get('title');
        $programme->description=$request->get('description');
        $programme->venue=$request->get('venue');
        $programme->speaker_id=$request->get('speaker_id');
        $programme->moderator_id=$request->get('moderator_id');

        $start_time=date_create($request->get('start_time'));
        $start_time_format = date_format($start_time,"Y-m-d");
        $programme->start_time = strtotime($start_time_format);

        $end_time=date_create($request->get('end_time'));
        $end_time_format = date_format($end_time,"Y-m-d");
        $programme->end_time = strtotime($end_time_format);

        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $programme->date = strtotime($format);

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
        $programme = \App\Programme::find($id);
        $programme->delete();
        return redirect('programme')->with('success','Information has been deleted');
    }
}
