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
                ->select('programme_sessions.id as id','title','description','session_type','start_time','end_time','date','Company_Name','your_title','Job_Title','Member_Airline','AFRAA_Partner','other','Passport_Number','Business_Address','Fax','documentation_language','Spouse_Name','Spouse_Nationality','Spouse_Passport_Number','ArrivalDate','FlightNumber','ArrivalTime','DepartureDate','DepartureFlightNumber','DepartureTime','Social_Functions','uid','name','username','email','email_verified_at','password','role','phone','bio','photo','country','verification_token','confirmation_code','verified','confirmed_date','deleted_at','remember_token')
                ->leftJoin('profiles', 'programme_sessions.user_id', '=', 'profiles.user_id')
                ->leftJoin('users', 'programme_sessions.user_id', '=', 'users.uid')
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
