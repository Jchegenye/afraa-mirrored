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
                    <p>Venue</p>
                    <input type="text" class="form-control" name="venue">
                    <small class="error">{{$errors->first('venue')}}</small>
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Speaker</p>

                    <select class="form-control" name="speaker_id">
                        @foreach( $users as $user )
                            <option value="{{ $user->uid }}" >{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Moderator</p>
                    <select class="form-control" name="moderator_id">
                        @foreach( $users as $user )
                            <option value="{{ $user->uid }}" >{{ $user->name }}</option>
                        @endforeach
                    </select>
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
                    <p>Date</p>
                    <input type="text" class="form-control date" name="date">
                    <small class="error">{{$errors->first('date')}}</small>
                </div>
            </div>
            {{--  <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <p>Featured Image</p>
                    <input type="file" class="form-control" name="featured_image">
                </div>
            </div>  --}}
            <div class="form-row pt-3 pb-4">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
      </form>
    </div>
@endsection
