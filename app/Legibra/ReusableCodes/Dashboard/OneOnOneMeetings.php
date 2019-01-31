<?php

namespace Afraa\Legibra\ReusableCodes\Dashboard;

use Illuminate\Http\Request;
use Afraa\Tables;
use Afraa\TimeSlots;
use Afraa\OneOnOne;
use Auth;
use Afraa\User;
use DB;


trait OneOnOneMeetings{

    /**
     * Retrieve all models && related models
     *
     * @author Jackson A. Chegenye
     * @return array
     **/
    public function retrieveOneOnOneMeetings()
    {

        $timeslots = TimeSlots::all();
        $tables = Tables::all();
    
        $oneononetables = DB::table('one_on_one')
            ->join('tables', function ($join)  use ( &$id ) {
                $join->on('one_on_one.table_id', '=', 'tables.id')
                    // ->orderBy('table_id', 'Asc')
                    ->where('one_on_one.delegate_id', Auth::user()->uid);
            })
            ->get();

        $oneononetimeslots = DB::table('one_on_one')
            ->join('time_slots', function ($join)  use ( &$id ) {
                $join->on('one_on_one.timeslot_id', '=', 'time_slots.id')
                    // ->orderBy('table_id', 'Asc')
                    ->where('one_on_one.delegate_id', Auth::user()->uid);
            })
            ->get();

        $oneononealltimeslots = DB::table('one_on_one')
            ->join('time_slots', function ($join)  use ( &$id ) {
                $join->on('one_on_one.timeslot_id', '=', 'time_slots.id');
                    // ->orderBy('table_id', 'Asc');
            })
            ->get();

        $oneononeallmeetings = DB::table('one_on_one')
            ->join('tables', function ($join)  use ( &$id ) {
                $join->on('one_on_one.table_id', '=', 'tables.id');
                    // ->orderBy('table_id', 'Asc')
            })
            ->get();
            
        //Counts
        $oneononemymeetingcount = DB::table('one_on_one')->where('one_on_one.delegate_id', Auth::user()->uid)->count(); //my meetings
        $oneononetotalmeetingcount = DB::table('one_on_one')->count();

        $data = [
            'timeslots' => $timeslots,
            'tables' => $tables,
            'oneononetables' => $oneononetables,
            'oneononetimeslots' => $oneononetimeslots,
            'oneononealltimeslots' => $oneononealltimeslots,
            'oneononeallmeetings' => $oneononeallmeetings,
            'oneononemymeetingcount' => $oneononemymeetingcount,
            'oneononetotalmeetingcount' => $oneononetotalmeetingcount
        ];

        return $data;
    
    }

    public function retrieveOneOnOneSingleMeetings($id)
    {

        $users = User::all();
        $delegateprofile = DB::table('users')
            ->join('profiles', function ($join)  use ( &$id ) {
                $join->on('profiles.user_id', '=', 'users.uid');
                    // ->orderBy('table_id', 'Asc')
            })
            ->get();

        $oneononesingletable = DB::table('one_on_one')
            ->join('tables', function ($join)  use ( &$id ) {
                $join->on('one_on_one.table_id', '=', 'tables.id')
                    ->where('one_on_one.table_id', '=', $id);
                    // ->orderBy('table_id', 'Asc')
            })
            ->get();

        $oneononesingletimeslot = DB::table('one_on_one')
            ->join('time_slots', function ($join)  use ( &$id ) {
                $join->on('one_on_one.timeslot_id', '=', 'time_slots.id')
                    ->where('one_on_one.table_id', '=', $id);
                    // ->orderBy('table_id', 'Asc')
            })
            ->get();

            $data = [
                'delegateprofile' => $delegateprofile,
                'users' => $users,
                'oneononesingletimeslot' => $oneononesingletimeslot,
                'oneononesingletable' => $oneononesingletable
            ];
    
            return $data;


    }

}