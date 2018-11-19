<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProgrammeSession extends Model
{
    //
    public function getSessions(){

        $sessions = DB::table('programme_sessions')
                ->join('users', function ($join) {

                    $join->on('programme_sessions.id', '=', 'users.uid');
                })
                ->get();

        return $sessions;
    }
}
