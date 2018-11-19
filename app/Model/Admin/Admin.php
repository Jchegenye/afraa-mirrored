<?php

namespace Afraa\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    //
    public function getAllStats(){

        $delegates = DB::table('users')->where('role','delegate')->count();

        $managers = DB::table('users')->where('role','manager')->count();

        $sponsors = DB::table('users')->where('role','sponsor')->count();

        $speakers = DB::table('users')
                    ->join('programme_sessions', function ($join) {

                        $join->on('programme_sessions.user_id', '=', 'users.uid');
                    })
                    ->count();

        $exhibitors = DB::table('users')->where('role','exhibitor')->count();

        $stats = array(
            'delegates' => $delegates,
            'managers' => $managers,
            'sponsors' => $sponsors,
            'speakers' => $speakers,
            'exhibitors' => $exhibitors
        );

        return $stats;

    }
}
