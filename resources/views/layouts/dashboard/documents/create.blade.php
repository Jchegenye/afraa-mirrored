@extends('layouts.app')

@section('title', 'Documents')

@section('content')

<div id="adminTable">

    <div class="table_header ">
        <div class="row ">
            <div class="col-md-4">
                <div class="mx-auto mt-2 intro1">
                    <h6 class="text-capitalize">{{ __('Add') }}</h6>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{url()->previous()}}" class="btn btn-afraa tb-sm-text">
                            <i class="fas fa-arrow-left pr-2"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table_body">
        <form class="" method="post" action="{{url('dashboard/admin/documents')}}" enctype="multipart/form-data">
            @csrf

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title">
                        <small class="error">{{$errors->first('title')}}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <p>Category</p>
                        <select  type="text" class="form-control" name="category">
                            <option value="speeches" >Speeches</option>
                            <option value="presentations" >Presentations</option>
                            <option value="reports" >Reports</option>
                            <option value="press" >Press Releases</option>
                        </select>
                        <small class="error">{{$errors->first('category')}}</small>
                    </div>
                    {{-- <div class="form-row pt-3 pb-4">
                        <div class="form-group col-md-12">
                            <p>Year</p> --}}
                            <input type="hidden" class="form-control year" name="year" value="2018">
                            {{-- <small class="error">{{$errors->first('year')}}</small>
                        </div>
                    </div> --}}
                    <div class="form-group col-md-6">
                        <p>File</p>
                        <input type="file" class="form-control" name="document_file"  accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.pdf">
                        <small class="error">{{$errors->first('document_file')}}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-afraa-full-2">Submit</button>
                    </div>
                </div>
            
        </form>
    </div>

@endsection
