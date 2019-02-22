<?php

namespace Afraa\Http\Controllers\Users;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Afraa\Http\Controllers\UtilController;
use Afraa\Model\Users;
use Afraa\Profile;
use Afraa\ProgrammeSession;
use Afraa\Speaker;
use Afraa\Events;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::id();

        $get_users = new Users();

        $user_by_id = $get_users->getUserById($id);

        return view('layouts.dashboard.profile.index',compact('user_by_id'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users = new Users;
        $user = $users->getUserById($id);

        return view('layouts.dashboard.profile.index',compact('user'));
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
        //$id = Auth::id();

        $sessions = new ProgrammeSession();
        $session = $sessions->getSessions();

        $get_users = new Users();

        $events = new Events;

        $event = $events->isRegisteredForEvent($id);

        $hasPaid = $events->hasPaidForEvent($id);

        $user_by_id = $get_users->getUserById($id);

        $isProfileUpdated = $get_users->isProfileUpdated($id);

        return view('layouts.dashboard.profile.edit',compact('user_by_id','session','event','hasPaid','isProfileUpdated'));
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
        $photo = "";

        if( $request->get('set_speaker') !== null ){

            $speakers = new Speaker;

            $speakers = $speakers->setSpeaker($request->get('session'),$id);

        }

        if( $request->get('next_event') !== null ){

            $events = new Events;

            $unique = new UtilController();

            $event = $events->saveEvent($id,$unique->uniqueString($id));

        }

        $current_password = $request->get('password');
        $new_password = $request->get('new_password');

        if($current_password !== null && $new_password !== null ){

            /*
            * Validate all input fields
            */

            // if ($validator->fails()) {
            //     return redirect()->back()->with('warning', 'There was an error updating your data please try again');
            // }

            $saved_password = Auth::user()->password;

            if (Hash::check($current_password, $saved_password)) {


                $user = \Afraa\Model\Users::where('uid', $id)
                    ->update(
                        [
                            'password' => Hash::make($new_password)
                        ]
                    );

                $this->userData($request,$id);

                return redirect()->back()->with('success', 'Information has been updated');

            } else {
                return redirect()->back()->with('warning', 'There was an error updating your profile please try again');
            }

        }else{

            // $this->validate( $request, [
            //     'email' => 'required|unique:users',
            // ]);

            $this->userData($request,$id);

            return redirect()->back()->with('success', 'Information has been updated');

        }

    }

    public function userData($request,$id){

        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $photo = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $photo);

            $user = \Afraa\Model\Users::where('uid', $id)
            ->update(
                [
                    'photo' => $photo
                ]
            );
        }

        $user = \Afraa\Model\Users::where('uid', $id)
            ->update(
                [
                    'username' => $request->get('username'),
                    'name' => $request->get('fullname'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                    'bio' => $request->get('bio'),
                    'country' => $request->get('country')
                ]
            );


            $profiles = new Profile();

            $profiles->saveProfile($request,$id);
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
    }
}
