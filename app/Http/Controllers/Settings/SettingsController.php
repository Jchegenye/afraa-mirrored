<?php

namespace Afraa\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;

use Afraa\Settings;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customize = Settings::all();

        return view('index', compact('customize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.dashboard.settings.index', ['customize' => Settings::all()->first()]);
        //return view('layouts.dashboard.settings.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            'theme_type'=>'required',
            'title_login'=>'required',
            'desc_login'=> 'required',
            //'photo_login' => 'required|unique:settings', //'photo_asc' => 'required', 'photo_aga' => 'required',
            //'bg_photo_login' => 'required',
        ],[
            'required' => 'This field is required.'
        ]);

        $file = $request->file('photo_login');
        $photo_login = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/settings', $photo_login);

        $file = $request->file('bg_photo_login');
        $bg_photo_login = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/settings', $bg_photo_login);
        
        $data = Settings::where('theme_type', '=', $request->get('theme_type'))->first();
        if(!empty($data->theme_type)){
            
            $data->title_login = $request->get('title_login');
            $data->desc_login = $request->get('desc_login');
            $data->photo_login = $photo_login;
            $data->bg_photo_login = $bg_photo_login;
            $data->save();

            return redirect()->back()->with('success', 'Theme setup has been updated!');
        
        }else{
            
            $customize = new Settings([
                'theme_type' => $request->get('theme_type'),
                'title_login' => $request->get('title_login'),
                'desc_login'=> $request->get('desc_login'),
                'photo_login' => $photo_login,
                'bg_photo_login' => $bg_photo_login
            ]);
            $customize->save();

            return redirect()->back()->with('success', 'Theme setup has been stored!');

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
        //
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
