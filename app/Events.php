<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Events extends Model
{
    //
    public function saveEvent($id,$unique){

        $event = DB::table('events')

            ->insert(

                [
                    'event_name' => 'asc_8',
                    'event_type' => 'ASC',
                    'payment_status' => 'NOT PAID',
                    'unique_id' => $unique,
                    'user_id' => $id
                ]

            );
    }

    public function updatePaymentStatus($status,$id){

        $event = DB::table('events')

            ->where("user_id",$id)

            ->update(

                [
                    'payment_status' => $status
                ]

            );
    }

    public function registerForEvent($id){

        $event = DB::table('events')

            ->insert(

                [
                    'event_name' => 'asc_8',
                    'event_type' => 'ASC',
                    'user_id' => $id
                ]

            );
    }

    public function isRegisteredForEvent($id){

        $count = DB::table('events')
            ->where('user_id', $id)
            ->count();

        if ($count > 0) {
            return true;
        }else{
            return false;
        }

        return false;
    }

    public function hasPaidForEvent($id){

        $count = DB::table('events')
            ->where('user_id', $id)
            ->where('payment_status', 'PAID')
            ->count();

        if ($count > 0) {
            return true;
        }else{
            return false;
        }

        return false;
    }
}
