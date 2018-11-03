<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Programme extends Model
{
    //
    public function getProgramme(){

        $user =  DB::table('programmes')
                ->join('programme_sessions', 'programmes.id', '=', 'programme_sessions.id')
                ->select('programme_sessions.*', 'programmes.id as programme_id')
                ->get();
        return $user;
    }
}
