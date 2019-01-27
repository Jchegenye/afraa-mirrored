<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OneOnOne extends Model
{
    //
    public function addTimeSlots($time, $tslot, $event){

        $timeslots = DB::table('one_on_one_timeslots')

        ->insert([
            'time' => $time,
            'tslot' => $tslot,
            'event' => $event
        ]);

        return $timeslots;

    }
}
