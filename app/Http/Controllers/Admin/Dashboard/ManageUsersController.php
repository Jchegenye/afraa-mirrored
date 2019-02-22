<?php

namespace Afraa\Http\Controllers\Admin\Dashboard;

use Afraa\User;
use Afraa\Mail\VerifyMail;
use Afraa\Model\Admin\Users\VerifyUser;
use Afraa\Model\Admin\Dashboard\UserPermissions;
use Afraa\Legibra\ReusableCodes\GenerateCustomVerifyTokenTrait;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveModels;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Maatwebsite\Excel\Facades\Excel;
//use Afraa\Exports\ExportList;

class ManageUsersController extends Controller
{

    use RetrieveModels;
    use GenerateCustomVerifyTokenTrait;

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

    public function managers()
    {

        $data = $this->RetrieveManagers();
        $user_type = "manager";
        return view('layouts.dashboard.admin.users',compact('user_type'))->with($data);

    }

    public function delegates()
    {

        $data = $this->RetrieveDelegates();
        $user_type = "delegate";
        return view('layouts.dashboard.admin.users',compact('user_type'))->with($data);

    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        Excel::create('Delegates List Export', function($excel) {
            $excel->sheet('Delegates', function($sheet) {

                //$user = User::all();
                $user = User::where('verified', '=', 1)->get();

                foreach ($user as $key => $value) {
                    $payload[] = array(
                        'Name' => $value['name'],
                        'Email' => $value['email'],
                        'Phone' => $value['phone'],
                        'Country' => $value['country']
                        // 'Date Joined' => $value['created_at']
                    );
                }
                $sheet->fromArray($payload);
            });
        })->download('xls');
        //return Excel::download(new ExportList, 'delegates.csv');
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

        if(empty($user)){

            Session::flash('warning', 'User in not verified!');
            return redirect()->back();

        }else{

            if($user->role == 'admin'){

                return redirect('dashboard/users')->with('unsuccessful', 'Not authorized to edit!');

            }else{

                $rolePermissions = $this->RetrieveUsers();

                return View('layouts.dashboard.admin.crud.users.edit')
                    ->with(['user' => $user])->with($rolePermissions);

            }

        }

    }

    /**
     * Update the given user.
     *
     * @author Jackson A. Chegenye
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $uid){

        request()->validate([

            'name' => 'required|max:255',
            'permissions' => 'required_without_all:permissions',

        ]);

        User::where('uid','=',$uid)->update(
            [
                'name' => $request->input('name'),
                'role' => $request->input('roleselector'),
                'permissions' => json_encode($request->input('permissions')),
            ]
        );

        Session::flash('successful', 'Profile successfully updated!');
        return redirect()->back()->withInput();

    }

    public function create($user_type){

        $data = $this->RetrieveUsers();
        return view('layouts.dashboard.admin.crud.users.create',compact('user_type'))->with($data);

    }

    public function store(Request $request){

        request()->validate([
            'name' => 'required|unique:users,name|min:4',
            'email' => 'email|unique:users,email|required',
            'phone' => 'required|unique:users|numeric|digits_between:1,14',
            //'bio' => 'required',
            'photo' => 'mimes:jpg,png|max:10048',
        ]);

        $role = $request->input('roleselector');
        $code = $this->generatePermissionsCode();

        $queryPermissions = UserPermissions::where('role','=', $role)->first();

        //$pw = Hash::make(Input::get('password'));
        $pw = Hash::make(str_random(8));

        if($queryPermissions){

            $myPhoto = "";
            //Check existing photo
            if($request->hasfile('photo'))
            {
                $file = $request->file('photo');
                $myPhoto=time().$file->getClientOriginalName();
                $file->move(public_path().'/images/', $myPhoto);
            }

                //Store user details
                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = $pw;
                $user->phone = $request->input('phone');
                $user->bio = $request->input('bio');
                $user->photo = $myPhoto;
                $user->verified = 1;
                $user->country = $request->input('country');
                $user->remember_token = $request->input('_token');
                $user->role = $request->input('roleselector');
                $user->permissions = $queryPermissions->permissions;
                $user->verification_token = $code;
                $user->save();

                $decrypted = Hash::check('plain-text', $pw);

                $verifyUser = VerifyUser::create([
                    'user_uid' => $user->uid,
                    'token' => sha1(time())
                ]);

                \Mail::to($user->email)->send(new VerifyMail($user, $decrypted));

                Session::flash('successful', 'Registration successful.');
                return redirect()->back()->withInput();

        }

    }

}
