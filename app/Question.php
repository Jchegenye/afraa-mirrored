<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    //
    public function getSpeakerSessions($user_id){

        $sessions = DB::table('programme_sessions')
        ->join('questions', 'questions.asked_by_id', '=', 'programme_sessions.user_id')
        ->where('questions.asked_by_id',$user_id)
        ->get();

        return $sessions;
    }
}
