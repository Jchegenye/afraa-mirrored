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

        $role = Auth::user()->role;

        $sessions_instance = new Question();

        if ($role == "admin") {

            $session = $sessions_instance->getAllSpeakerSessions();

        } else if($role == "delegate"){

            $session = $sessions_instance->getSpeakerSessions($user_id);

        }


        foreach ($session as $key => $sessions) {

            $sessions->questions = $this->getSpeakerQuiz($role,$sessions->id,$sessions_instance,$user_id);

        }

        //dd($session);

        return view('layouts/dashboard/qna/index',compact('session'));
    }

    public function getSpeakerQuiz($role,$session_id,$sessions_instance,$user_id){

        $quiz = $sessions_instance->getSpeakerQuestions($session_id);

        if (empty($quiz)) {
            return [];
        }
        return $quiz;
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
        //dd($request);
        $question= new \Afraa\Question;

        $this->validate(
            $request,
            [
                'question' => 'required',

            ]
        );

        $question->text = $request->get('question');
        $question->asked_by_id = Auth::id();
        $question->session_id = $request->get('session_id');

        $question->save();

        return redirect()->back()->with('success', 'Your question has been received.');

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

        return redirect()->back()->with('success','Question has been deleted');
    }
}
