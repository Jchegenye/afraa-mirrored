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

    <div class=""> <!-- table_body -->

        @foreach ($user as $user_)
            {{$user_->photo}}
            {{$user_->name}}
            {{$user_->country}}
            {{$user_->your_title}}
            {{$user_->bio}}
        @endforeach

    </div>

</div>

@endsection
