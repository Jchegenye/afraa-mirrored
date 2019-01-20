@extends('layouts.app')

@section('title', 'Show Profile')

@section('content')


<div id="adminTable">
    <div class="table_header ">
        <div class="row ">
            <div class="col-md-2">
                <div class="mx-auto mt-2 intro1">
                    <h6 class="text-capitalize">Profile</h6>
                </div>
            </div>
            <div class="col-md-8 text-center">
            </div>

            <div class="col-md-2">
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

    <div class="profile w-75 mx-auto mb-5 mt-2"> <!-- table_body -->

        @foreach ($user as $user_)
        <div class="card border-none mb-5 p-4 rounded">
            <div class="card-img-top text-center">
                <img class="img-fluid logo w-75" src="{{URL::asset('/images/' . $user_->photo)}}" alt="prof pic">
            </div>
            <div class="card-body text-center">
                <h3  class="card-text  mb-0"> <span>{{$user_->your_title}} </span>{{$user_->name}}</h3>
                <h5 class="card-text text-center pr-4"><b><i>{{$user_->country}}</i></b></h5>
                <p class="text-justify p-2 border-top card-footer">{{$user_->bio}}</p>
            </div>
        </div>
        @endforeach

    </div>

</div>

@endsection
