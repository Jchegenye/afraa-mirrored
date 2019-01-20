<?php

namespace Afraa\Legibra\ReusableCodes\Dashboard;

use Afraa\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        public $sessions;

        public function getCurrentSessions()
        {

            $currentDate = Carbon::now()->format('Y-m-d'); //Get current date
            $currentTime = Carbon::now()->format('H:i:s'); //Get current time

            $sessions = DB::table('programme_sessions') //Compare current date, time with a given session.
                ->whereDate('date', $currentDate) 
                ->where('start_time', '<=', $currentTime) // start_time is less than or equal to $currentTime
                ->where('end_time', '>=', $currentTime)
                ->orderBy('start_time','DESC') //
                ->get();

            return $sessions;

        }

    
        public function getNextSessions()
        {

            $getCurrentEndTime = $this->getCurrentSessions()->first();
            $this->sessions = $getCurrentEndTime;
            
            if($this->sessions !== null){

                $sessionTime = Carbon::create($this->sessions->end_time)->addMinutes(15)->format('H:i');
                $currentDate = Carbon::now()->format('Y-m-d');

                $data = DB::table('programme_sessions') //Compare current date, time with a given session.
                    ->whereDate('date', $currentDate) 
                    ->where('start_time', '<=', $sessionTime) // start_time is less than or equal to $currentTime
                    ->where('end_time', '>=', $sessionTime)
                    ->orderBy('start_time','DESC') //
                    ->get();

                return $data;

            }
                        
        }

    }
