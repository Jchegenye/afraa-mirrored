<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Events extends Model
{
    //
    public function saveEvent($id){

        $event = DB::table('events')

            ->insert(

                [
                    'name' => 'asc_8',
                    'type' => 'ASC',
                    'user_id' => $id
                ]

            );
    }

    public function checkRegisteredEvent($id){

        $count = DB::table('events')
            ->where('user_id', $id)
            ->count();

        if ($count > 0) {
            return true;
        }

        return false;
    }
}
