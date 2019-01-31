@extends('layouts.app')
@section('title', 'One On One Meetings')

@section('content')

    <div class="row mb-4">
        <div class="col-md-12 heading">
            <h3 class="page-header"> @yield('title')</h3>
            <p>Use the form below to add a table for one on one meetings</p>
            <a href="{{ route('tables.index') }}" class="btn btn-afraa-full-2 float-right ml-3"><i class="fas fa-arrow-left"></i> Go Back</a>
            <a href="{{ route('oneonone.meetings') }}" class="btn btn-afraa-full-2 float-right">Meetings</a>
        </div>
    </div>

    <form enctype="multipart/form-data" method="POST" action="{{route('tables.store')}}" >
        @csrf
        {{-- SAVE companyname AS SLUG ALSO --}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <small class="font-italic text-primary">Enter company logo here.</small>
                    <input type="file" class="form-control" id="image_name" name="image_name" value="{{ old('image_name') }}" placeholder="Enter image name">
                    @if ($errors->has('image_name'))
                        <small class="text-sm-left text-danger" role="alert">
                            <strong>{{ $errors->first('image_name') }}</strong>
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}" placeholder="Enter company name">
                    @if ($errors->has('company'))
                        <small class="text-sm-left text-danger" role="alert">
                            <strong>{{ $errors->first('company') }}</strong>
                        </small>
                    @endif
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name of person at the table">
                    @if ($errors->has('name'))
                        <small class="text-sm-left text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </small>
                    @endif
                </div>  
                <div class="form-group">
                    <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}" placeholder="Enter company position of person at the table">
                    @if ($errors->has('position'))
                        <small class="text-sm-left text-danger" role="alert">
                            <strong>{{ $errors->first('position') }}</strong>
                        </small>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-afraa-full-2 mb-2">Submit</button>
            </div>
        </div>
    </form>

@endsection