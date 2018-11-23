<?php

namespace Afraa\Http\Controllers;

use Illuminate\Http\Request;
use Afraa\Document;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $documents = \Afraa\Document::all();

        return view('layouts.dashboard.documents.index',compact('documents'));
    }

    public function aga(){

        $documents = \Afraa\Document::select('year')->distinct()->get();

        return view('layouts.dashboard.documents.innerpages.aga',compact('documents'));
    }

    public function agaAll($year){

        $documents = \Afraa\Document::where('year',$year)->get();

        return view('layouts.dashboard.documents.innerpages.singleaga',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.dashboard.documents.create',compact(''));
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

        $document = new \Afraa\Document;

        $this->validate(
            $request,
            [
                'document_file' => 'required|mimes:doc,docx,xls,xlsx,ppt,pdf,zip|max:10048',
                'title' => 'required',
                'category' => 'required',
                'year' => 'required',

            ]
        );

        $name;

        if($request->hasfile('document_file'))
        {
           $file = $request->file('document_file');
           $name = time().$file->getClientOriginalName();
           $file->move(public_path().'/files/documents/', $name);
        }

        $document->title = $request->get('title');
        $document->category = $request->get('category');
        $document->year = $request->get('year');
        $document->name = $name;

        $document->save();

        $documents = \Afraa\Document::all();

        //return redirect()->back()->with('successful', 'Information has been added');
        return view('layouts.dashboard.documents.index',compact('documents'))->with('successful', 'Information has been added');

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
        $document = \Afraa\Document::find($id);

        $document->delete();

        return redirect()->back()->with('success','Document has been deleted');
    }
}
