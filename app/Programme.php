<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Programme extends Model
{
    //
    public function getProgramme($id){

        $programmes = DB::table('programmes')
                ->join('programme_sessions', function ($join)  use ( &$id ) {

                    $join->on('programme_sessions.id', '=', 'programmes.session_id')
                         ->where('programmes.user_id', '=', $id);
                })
                ->get();

        return $programmes;
    }
}
