<?php

namespace Afraa\Http\Controllers\Admin\Dashboard;

use Afraa\User;
use Afraa\Model\Admin\Dashboard\UserPermissions;
use Validator;
use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveModels;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ManageUsersController extends Controller
{

    use RetrieveModels;
    
    /**
     * Create a new controller instance.
     * 
     * @author Jackson A. Chegenye
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the users dashboard.
     *
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = $this->RetrieveUsers();
        return view('layouts.dashboard.admin.users')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     * 
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function liveSearch(Request $request)
    { 
        //$search = request()->uid;
        $data = $this->RetrieveUsers();
        return view('layouts.dashboard.admin.livesearchajax')->with($data);

    }

    /**
     * Trash user to a recycle bin - Soft delete
     * 
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function trash($uid)
    {

        $trash = User::withTrashed()
            ->where('uid', (int)$uid)
            ->first();

        //Determine if user model instance has been soft deleted.
        if ($trash->trashed()) {

            $trash->restore();

            $trash->verified = 1;
            $trash->save();

            Session::flash('warning', 'untrashed!');
            return redirect()->back();
            
        }
        elseif ($trash->trashed() == null OR empty($trash->trashed())){

            $trash->delete();

            $trash->verified = 0;
            $trash->save();

            Session::flash('successful', 'trashed!');
            return redirect()->back();

        }
        
    }

    /**
     * Edit user details - Soft delete
     * 
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function edit( $uid){

        $user = User::where('uid', '=', (int)$uid)
            ->where('verified','=','1')
            ->first();

        $rolePermissions = $this->RetrieveUsers();

        return View('layouts.dashboard.admin.crud.users.edit')
            ->with(['user' => $user])->with($rolePermissions);

    }

    /**
     * Update the given user.
     * 
     * @author Jackson A. Chegenye
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request,$uid){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
            'roleselector' => 'required',
            'permissions[]' => 'required',
        ]);
        
        if ($validator->fails()) {

            return back()
                    ->withErrors($validator)
                    ->withInput();;

        } else {

            if (Cache::has('role_' . $id))
            {
                $role = Cache::get('role_' . $id);
            }
            else{
                $role = Role::find($id);
                Cache::put('role_' . $id, $role, 360);
            }
            $role->permission_name = Input::get('permission_name');
            $role->save();

            Cache::forget('role_' . $id);
            
            // $update = User::where('uid', '=', (int)$uid)
            // ->where('verified','=','1')
            // ->first();
            // $update->name = $request->name;
            // $update->save();

            return back()->with('successful', 'Profile updated!');

        }
        


        // $update = User::where('uid', '=', (int)$uid)
        //     ->where('verified','=','1')
        //     ->first();
        // $update->name = 'New Flight Name';
        // $update->save();

    }

}
