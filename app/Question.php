<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    //
    public function getAllSpeakerSessions(){

        $sessions = DB::table('programme_sessions')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('questions')
                    ->whereRaw('programme_sessions.id = questions.session_id');
            })
            ->get();

        return $sessions;
    }

    public function getSpeakerSessions($user_id){

        $sessions = DB::table('programme_sessions')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('questions')
                    ->whereRaw('programme_sessions.id = questions.session_id');
            })
            ->where('programme_sessions.user_id',$user_id)
            ->get();

        return $sessions;
    }

    public function getSessions(){

        $sessions = DB::table('programme_sessions')
            ->get();

        return $sessions;
    }

    public function getSpeakerQuestions($session_id){

        $sessions = DB::table('questions')
        ->where('questions.session_id',$session_id)
        ->get();

        return $sessions;
    }

    // public function getAllSpeakerQuestions($session_id){

    //     $sessions = DB::table('questions')
    //     ->where('questions.session_id',$session_id)
    //     ->get();

    //     return $sessions;
    // }
}
