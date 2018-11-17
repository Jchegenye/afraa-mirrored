<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Speaker extends Model
{
    //
    public function getSpeakers(){

        $speakers = DB::table('users')
                ->join('programme_sessions', function ($join) {

                    $join->on('programme_sessions.user_id', '=', 'users.uid');
                })
                ->get();

        return $speakers;
    }

    public function getSpeakerById($id){

        $speakers = DB::table('users')
                ->join('programme_sessions', function ($join)  use ( &$id ) {

                    $join->on('programme_sessions.user_id', '=', 'users.uid')
                    ->where('users.uid', '=', $id);
                })
                ->get();

        return $speakers;
    }

    public function deleteSpeaker($session_id,$user_id){

        $speaker = DB::table('programme_sessions')
            ->where('programme_sessions.id', $session_id)
            ->update(['user_id' => 0]);

    }
}
