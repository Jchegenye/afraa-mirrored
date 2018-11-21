<?php

namespace Afraa\Http\Controllers;

use Illuminate\Http\Request;
use Afraa\Question;
use Afraa\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::id();

        $session = new Question();

        $sessions = $sessions->getSpeakerSessions($user_id);

        return view('layouts/dashboard/qna/index',compact('session'));
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
        $question= new \Afraa\Question;

        $this->validate(
            $request,
            [
                'text' => 'required',

            ]
        );

        $session->text=$request->get('text');
        $session->asked_by_id=$request->get('asked_by_id');
        $session->session_id=$request->get('session_id');

        $session->save();

        return redirect()->back()->with('success', 'Information has been updated');

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
        ////
        $question = \Afraa\Question::find($id);

        $question->delete();

        return redirect()->back()->with('success','Information has been deleted');
    }
}
