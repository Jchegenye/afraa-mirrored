<?php

namespace Afraa\Http\Controllers\OneonOne;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Afraa\Tables;
use Afraa\TimeSlots;
use Carbon\Carbon;

class TimeSlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $timeslots = TimeSlots::latest()->paginate(6);
        // return view('layouts.dashboard.oneonone.index',compact('timeslots'))
        //     ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.dashboard.oneonone.timeslot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = TimeSlots::all();
        
        foreach($data as $value){

            //get first value of available time 'from' i.e 08:00
            $from = 
                $value['time']['multi_time'][0][0] . 
                $value['time']['multi_time'][0][1] .
                $value['time']['multi_time'][0][2] .
                $value['time']['multi_time'][0][3] .
                $value['time']['multi_time'][0][4];

            //get last value of available time 'to' i.e 09:00
            $last = last($data[0]['time']['multi_time']);
            $to = $last[8]. $last[9]. $last[10]. $last[11]. $last[12];

                if($request->get('from'). " - " .$request->get('to') <= $from. " - " .$to){
                    return redirect()
                        ->route('tables.index')->error("Your selected timeslot already exists between " .$from ." - ". $to. "!");
                }{

                    $this->validate($request, [
                        'from' => 'required|unique:time_slots,time',
                        'to' => 'required|unique:time_slots,time',  
                        'step' => 'required|numeric|min:1',
                    ]);

                    $timeSlots = new TimeSlots();

                        $from = Carbon::parse($request->get('from'))->format('H:i');
                        $to = Carbon::parse($request->get('to'))->format('H:i');
                        $step = $request->get('step');

                        $totalTime = Carbon::parse($from)->diffInMinutes($to);
                        $slots = $totalTime / $step;
                        
                        $slot_array = [$from];

                        $time_array = [];
                        $tslot_array = [];
                        for ($i=1; $i <= $slots; $i++){

                            $upto = Carbon::parse($slot_array[$i-1])->addMinutes($step)->format('H:i');
                            array_push($slot_array, $upto);

                            $time = $slot_array[$i-1] . ' - ' . $slot_array[$i];
                            $tslot = 'ts_' . $i;
                            $event = 'asc_8';

                            array_push($time_array, $time);
                            array_push($tslot_array, $tslot);

                            //$timeSlots->addTimeSlots($time, $tslot, $event);
                        
                        }

                        $array = [
                            0 => [
                                'multi_time' => $time_array
                            ],
                            1 => [
                                'multi_tslot' => $tslot_array
                            ]
                        ];
                        $timeSlots->date = Carbon::now();
                        $timeSlots->tslot = $array[1];
                        $timeSlots->time = $array[0];

                    $timeSlots->save();

                    return redirect()
                        ->route('tables.index')
                        ->success($request->get('from'). " to " .$request->get('to'). " timeslot has been added. " .$request->get('step'). " minutes split time each!");
                }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $timeslots = TimeSlots::where('id', $id)->first();
        return view('layouts.dashboard.oneonone.timeslot.edit',compact('timeslots'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'from' => 'required|unique:time_slots,time',
            'to' => 'required|unique:time_slots,time',  
            'step' => 'required|numeric|min:1',
        ]);

        $timeSlots = TimeSlots::find($id);
            $from = Carbon::parse($request->get('from'))->format('H:i');
            $to = Carbon::parse($request->get('to'))->format('H:i');
            $step = $request->get('step');

            $totalTime = Carbon::parse($from)->diffInMinutes($to);
            $slots = $totalTime / $step;
            
            $slot_array = [$from];

            $time_array = [];
            $tslot_array = [];
            for ($i=1; $i <= $slots; $i++){

                $upto = Carbon::parse($slot_array[$i-1])->addMinutes($step)->format('H:i');
                array_push($slot_array, $upto);

                $time = $slot_array[$i-1] . ' - ' . $slot_array[$i];
                $tslot = 'ts_' . $i;
                $event = 'asc_8';

                array_push($time_array, $time);
                array_push($tslot_array, $tslot);

                //$timeSlots->addTimeSlots($time, $tslot, $event);
            
            }

            $array = [
                0 => [
                    'multi_time' => $time_array
                ],
                1 => [
                    'multi_tslot' => $tslot_array
                ]
            ];
            $timeSlots->date = Carbon::now();
            $timeSlots->tslot = $array[1];
            $timeSlots->time = $array[0];

        $timeSlots->save();

        return back()->success("Timeslot has been updated!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeslots = TimeSlots::where('id', $id)->first();
        $timeslots->delete();

        return back()->warning("Timeslot has been deleted!");
    }
}
