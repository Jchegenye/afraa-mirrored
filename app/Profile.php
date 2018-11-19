<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    //
    public function saveProfile($request,$id){

        $count = DB::table('profiles')
            ->where('user_id', $id)
            ->count();

        if ($count <= 0) {

            $users = DB::table('profiles')

            ->insert(

                [
                    'Company_Name' => $request->get('Company_Name'),
                    'your_title' => $request->get('your_title'),
                    'Job_Title' => $request->get('Job_Title'),
                    'Member_Airline' => $request->get('Member_Airline'),
                    'AFRAA_Partner' => $request->get('AFRAA_Partner'),
                    'other' => $request->get('other'),
                    'Passport_Number' => $request->get('Passport_Number'),
                    'Business_Address' => $request->get('Business_Address'),
                    'Fax' => $request->get('Fax'),
                    'documentation_language' => $request->get('documentation_language'),
                    'Spouse_Name' => $request->get('Spouse_Name'),
                    'Spouse_Nationality' => $request->get('Spouse_Nationality'),
                    'Spouse_Passport_Number' => $request->get('Spouse_Passport_Number'),
                    'ArrivalDate' => $request->get('ArrivalDate'),
                    'FlightNumber' => $request->get('FlightNumber'),
                    'ArrivalTime' => $request->get('ArrivalTime'),
                    'DepartureDate' => $request->get('DepartureDate'),
                    'DepartureFlightNumber' => $request->get('DepartureFlightNumber'),
                    'DepartureTime' => $request->get('DepartureTime'),
                    'Social_Functions' => $request->get('Social_Functions'),
                    'user_id' => $id
                ]

            );

        } else {

            $users = DB::table('profiles')
                ->where('user_id', $id)
                ->update(
                    [
                        'Company_Name' => $request->get('Company_Name'),
                        'your_title' => $request->get('your_title'),
                        'Job_Title' => $request->get('Job_Title'),
                        'Member_Airline' => $request->get('Member_Airline'),
                        'AFRAA_Partner' => $request->get('AFRAA_Partner'),
                        'other' => $request->get('other'),
                        'Passport_Number' => $request->get('Passport_Number'),
                        'Business_Address' => $request->get('Business_Address'),
                        'Fax' => $request->get('fax'),
                        'documentation_language' => $request->get('documentation_language'),
                        'Spouse_Name' => $request->get('Spouse_Name'),
                        'Spouse_Nationality' => $request->get('Spouse_Nationality'),
                        'Spouse_Passport_Number' => $request->get('Spouse_Passport_Number'),
                        'ArrivalDate' => $request->get('ArrivalDate'),
                        'FlightNumber' => $request->get('FlightNumber'),
                        'ArrivalTime' => $request->get('ArrivalTime'),
                        'DepartureDate' => $request->get('DepartureDate'),
                        'DepartureFlightNumber' => $request->get('DepartureFlightNumber'),
                        'DepartureTime' => $request->get('DepartureTime'),
                        'Social_Functions' => json_encode($request->get('Social_Functions'))
                    ]
                );

        }

    }
}
