<?php

namespace Afraa\Http\Controllers;

use Afraa\OneOnOne;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OneOnOneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //echo "dsdasdas";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Afraa\OneOnOne  $oneOnOne
     * @return \Illuminate\Http\Response
     */
    public function show(OneOnOne $oneOnOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Afraa\OneOnOne  $oneOnOne
     * @return \Illuminate\Http\Response
     */
    public function edit(OneOnOne $oneOnOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Afraa\OneOnOne  $oneOnOne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OneOnOne $oneOnOne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Afraa\OneOnOne  $oneOnOne
     * @return \Illuminate\Http\Response
     */
    public function destroy(OneOnOne $oneOnOne)
    {
        //
    }

    public function slotIndex(){
        return view('layouts.dashboard.one_on_one.timeslot');
    }

    public function insertTimeSlots(Request $request){

        $oneOnOne = new OneOnOne();

        $from = Carbon::parse($request->get('from'))->format('g:i');
        $to = Carbon::parse($request->get('to'))->format('g:i');
        $step = $request->get('step');

        $totalTime = Carbon::parse($from)->diffInMinutes($to);

        $slots = $totalTime / $step;

        $slot_array = [$from];

        for ($i=1; $i <= $slots; $i++) {

            $upto = Carbon::parse($slot_array[$i-1])->addMinutes($step)->format('g:i');

            array_push($slot_array , $upto);


            $time = $slot_array[$i-1] . '-' .$slot_array[$i];
            $tslot = 'ts_' . $i;
            $event = 'asc_8';
            $oneOnOne->addTimeSlots($time, $tslot, $event);

        }

    }
}
