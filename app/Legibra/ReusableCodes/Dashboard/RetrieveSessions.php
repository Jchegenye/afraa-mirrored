<?php

namespace Afraa\Legibra\ReusableCodes\Dashboard;

use Afraa\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

{

    /**
     * This trait is used to query for data in your tables.
     *
     * Add your own query.
     *
     * @author Jackson A. Chegenye
     * @return models
     */
    trait RetrieveSessions
    {

        /**
         * Retrieve all sessions based on time & date.
         *
         * @author Jackson A. Chegenye
         * @return array
         **/
        public function CurrentSessions(){

            $currentDate = Carbon::now()->format('Y-m-d'); //Get current date
            $currentTime = Carbon::now()->format('H:i:s'); //Get current time

            //echo $currentTime;

            $sessions = DB::table('programme_sessions') //Compare current date, time with a given session.
                ->whereDate('date', $currentDate) 
                ->where('start_time', '<=', $currentTime)
                ->where('end_time', '=>', $currentTime)
                ->get();

            // $data = [

            //     'sessions' => $sessions,

            // ];
            return $sessions;

        }

    }
}
