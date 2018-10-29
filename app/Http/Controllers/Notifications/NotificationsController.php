<?php

namespace Afraa\Http\Controllers\Notifications;

use App\Notifications;
use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notifications = \Afraa\Notifications::all();
        return view('notifications.index',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('notifications.create');
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
        $notifications = new \Afraa\Notifications;

        $notifications->title = $request->get('title');
        $notifications->description = $request->get('description');

        $notifications->send_time = $request->get('send_time');

        $notifications->save();

        return redirect('notifications')->with('success', 'Notification has been added');
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
        //
        $notifications = \Afraa\Notifications::find($id);
        return view('notifications.edit',compact('notifications','id'));
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
        //
        $notifications = new \Afraa\Notifications;

        $notifications->title = $request->get('title');
        $notifications->description = $request->get('description');

        $notifications->send_time = $request->get('send_time');

        $notifications->save();

        return redirect('notifications')->with('success', 'Notification has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $notifications = \Afraa\Notifications::find($id);
        $notifications->delete();
        return redirect('notifications')->with('success','Information has been deleted');
    }
}
