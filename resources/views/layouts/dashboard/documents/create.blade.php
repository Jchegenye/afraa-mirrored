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
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Category</p>
                    <input type="text" class="form-control" name="category">
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Year</p>
                    <input type="text" class="form-control" name="year">
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>File</p>
                    <input type="file" class="form-control" name="document_file">
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