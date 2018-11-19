@extends('layouts.app')

@section('title', 'Documents')

@section('content')

      <form class="shadow mt-5" method="post" action="{{url('dashboard/admin/documents')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-row heading p-5">
            <h5>{{ __('Add New Document') }}</h5>
            <p></p>
        </div>
        <div class="p-5">
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                    <small class="error">{{$errors->first('title')}}</small>
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Category</p>
                    <select  type="text" class="form-control" name="category">
                        <option value="speeches" >Speeches</option>
                        <option value="presentations" >Presentations</option>
                        <option value="reports" >Reports</option>
                        <option value="press" >Press Releases</option>
                    </select>
                    <small class="error">{{$errors->first('category')}}</small>
                </div>
            </div>
            {{-- <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Year</p> --}}
                    <input type="hidden" class="form-control year" name="year" value="2018">
                    {{-- <small class="error">{{$errors->first('year')}}</small>
                </div>
            </div> --}}
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>File</p>
                    <input type="file" class="form-control" name="document_file"  accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.pdf">
                    <small class="error">{{$errors->first('document_file')}}</small>
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
      </form>
    </div>
@endsection
