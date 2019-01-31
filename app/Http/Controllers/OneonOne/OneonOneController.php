<?php

namespace Afraa\Http\Controllers\OneonOne;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Afraa\Legibra\ReusableCodes\Dashboard\OneOnOneMeetings;
use Afraa\Tables;
use Afraa\TimeSlots;
use Afraa\OneOnOne;
use Auth;
use User;
use DB;

class OneonOneController extends Controller
{

    use OneOnOneMeetings;

    public function ajaxOneOnOne(){

        $data = $this->retrieveOneOnOneMeetings();

        return $data['tables'];

    }
    
    public function myMeetings()
    {

        $data = $this->retrieveOneOnOneMeetings();
        return view('layouts.dashboard.oneonone.inner.mymeetings', $data);

    }

    public function meetings(Request $id)
    {

        $data = $this->retrieveOneOnOneMeetings();

        return view('layouts.dashboard.oneonone.inner.meetings', $data);

    }

    public function oneononeStore(Request $request)
    {

        $slots = TimeSlots::where('time',  $request->get('timeSlot'))->first();

        $this->validate($request, [
            'timeSlot' => 'required',
        ]);

        $oneonone = new OneOnOne;
        $oneonone->delegate_id = Auth::user()->uid;
        $oneonone->timeslot_id = $slots->id;
        $oneonone->table_id = $request->get('tableId');
        $oneonone->slug = $request->get('tableSlug');
        $oneonone->save();

        return redirect()->route('tables.index')->success("Your meeting with ".$request->get('tableTitle')." is Confirmed.");
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeslots = TimeSlots::latest()->paginate(8);
        $tables = Tables::latest()->paginate(6);

        return view('layouts.dashboard.oneonone.index',compact('tables', 'timeslots'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.dashboard.oneonone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'image_name' => 'required',
            'company' => 'required|unique:tables',
            'name' => 'required',
            'position' => 'required',
        ]);

        $file = $request->file('image_name');
        $image_name = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/tables', $image_name);

        $tables = new Tables;
        $tables->slug = str_slug($request->company, "-"); //change company name to slug
        $tables->company = $request->company;
        $tables->name = $request->name;
        $tables->position = $request->position;
        $tables->image_name = $image_name;
        $tables->save();

        return redirect()->route('tables.index')->success($request->company . " table has been added!");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tables = Tables::where('id', $id)->first();
        $oneononesingletable = $this->retrieveOneOnOneSingleMeetings($id);
        $oneononesingletimeslot = $this->retrieveOneOnOneSingleMeetings($id);
        $users = $this->retrieveOneOnOneSingleMeetings($id);
        $delegateprofile = $this->retrieveOneOnOneSingleMeetings($id);

        return view('layouts.dashboard.oneonone.show',compact('tables', 'oneononesingletable', 'oneononesingletimeslot','users','delegateprofile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tables = Tables::where('id', $id)->first();
        return view('layouts.dashboard.oneonone.edit',compact('tables'));
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
            'image_name' => 'required',
            'company' => 'required',
            'name' => 'required',
            'position' => 'required',
        ]);

        $file = $request->file('image_name');
        $image_name = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/tables', $image_name);

        $tables = Tables::find($id);
        $tables->slug = str_slug($request->company, "-"); //change company name to slug
        $tables->company = $request->company;
        $tables->name = $request->name;
        $tables->position = $request->position;
        $tables->image_name = $image_name;
        $tables->save();

        return back()->success($request->company . " table has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tables = Tables::where('id', $id)->first();
        $tables->delete();

        return back()->warning($tables->company . " table has been deleted!");
    }
}
