<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProgrammeSession extends Model
{
    //
    public function getSessions(){

        // $sessions = DB::table('programme_sessions')
        //     ->join('users', 'users.uid', '=', 'programme_sessions.user_id')
        //     ->join('profiles', 'profiles.user_id', '=', 'users.uid')
        //     ->where('users.uid=programme_sessions.user_id')
        //     ->get();

        $sessions = DB::table('programme_sessions')
            ->join('users', 'users.uid', '=', 'programme_sessions.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.uid')

            ->get();

        // $sessions = DB::table('programme_sessions')
        //         ->join('users', function ($join) {

        //             $join->on('programme_sessions.id', '=', 'users.uid');
        //         })
        //         ->join('profiles', function ($join) {

        //             $join->on('profiles.user_id', '=', 'users.uid');
        //         })
        //         ->get();

        return $sessions;
    }
}
