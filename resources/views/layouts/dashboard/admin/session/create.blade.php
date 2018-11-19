@extends('layouts.app')

@section('title', 'Dashboard/Admin/Session/create')

@section('content')

      <form class="shadow mt-5" method="post" action="{{url('dashboard/admin/session')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-row heading p-5">
            <h5>{{ __('Add New Session') }}</h5>
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
                    <p>Description</p>
                    <textarea type="text" class="form-control" name="description" rows="5"></textarea>
                    <small class="error">{{$errors->first('description')}}</small>
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Speaker / Moderator:</p>

                    <select class="form-control" name="user_id">
                        @foreach( $users as $user )
                            <option value="{{ $user->uid }}" >{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Session Type:</p>
                    <input type="radio" name="session_type" value="moderator" checked>Moderator
                    <input type="radio" name="session_type" value="speaker">Speaker
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Start Time</p>
                    <input type="text" class="form-control start_time" name="start_time">
                    <span class="add-on"><i class="icon-th"></i></span>
                    <small class="error">{{$errors->first('start_time')}}</small>
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>End Time</p>
                    <input type="text" class="form-control end_time" name="end_time">
                    <small class="error">{{$errors->first('end_time')}}</small>
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Day</p>
                    <select class="form-control date" name="date">
                        <option value="2018-10-25" >Day One</option>
                        <option value="2018-10-26" >Day Two</option>
                        <option value="2018-10-27" >Day Three</option>
                    </select>
                    <small class="error">{{$errors->first('date')}}</small>
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
