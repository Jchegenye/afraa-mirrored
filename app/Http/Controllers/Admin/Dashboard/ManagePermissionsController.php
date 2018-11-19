<?php

namespace Afraa\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Afraa\Model\Admin\Dashboard\UserPermissions;

class ManagePermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = UserPermissions::all();
        return view('layouts.dashboard.admin.permissions',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('layouts.dashboard.admin.crud.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions= new UserPermissions;
        // $permissions->role=$request->get('role');
        $permissions->permissions=json_encode($request->get('permissions'));
        $permissions->save();
        
        return redirect('layouts.dashboard.admin.permissions')->with('successful', 'Permission(s) has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $pid
     * @return \Illuminate\Http\Response
     */
    public function show($pid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pid
     * @return \Illuminate\Http\Response
     */
    public function edit($pid)
    {
        $permissions = UserPermissions::find($pid);
        return view('layouts.dashboard.admin.crud.permissions.edit',compact('permissions','pid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $pid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pid)
    {
        $permissions= UserPermissions::find($pid);
        $permissions->role=$request->get('role');
        $permissions->permissions=json_encode($request->get('permissions'));
        $permissions->save();

        return redirect('layouts.dashboard.admin.crud.permissions.edit')->with('successful', 'Permission(s) has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pid
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid)
    {
        //
    }
}
