@extends('layouts.app')

@section('title', 'Speaker')

@section('content')

@php
    //dd($speakers);
    //dd($all_users);
@endphp

<div class="row">
    <div class="col-md-12 heading">
        <h3 class="page-header">All Speakers/Panelists/Moderators</h3>
        <p></p>
    </div>
</div>

<section id="speksponexib" class="speaker">
        <div class="row">
            @foreach($speakers as $index => $speaker)

                @if ($index % 3 == 0)
                        </div>
                    <div class="row mb-4 mt-4">
                @endif


                <div class="col-md-4">

                    <div class="box text-center">

                        @if (empty($speaker->photo))
                            <img class="img-fluid afraa-logo" src="{{ asset('images') }}/placeholder.png" alt="Card image cap">
                        @else
                            <img class="img-fluid afraa-logo" src="{{ asset('images') }}/{{$speaker->photo}}" alt="Card image cap">
                        @endif

                        <h6>{{$speaker->name}}</h6>
                        <p>{{$speaker->title}}</p>

                        @if(Auth::user()->role == 'admin')
                            <div class="box-footer">
                                <a href="{{action('Users\UsersController@edit', $speaker->uid)}}" class="edit">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>
                                <a href="{{url('dashboard/admin/delete_speaker/')}}/{{$speaker->id}}/{{$speaker->uid}}" class="delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach

            @foreach($all_users as $index =>  $users_2)

                @if ($users_2->uid == 344 || $users_2->uid == 373 || $users_2->uid == 201 || $users_2->uid == 218)

                    <div class="col-md-4 mt-4">

                        <div class="box text-center">

                            @if (empty($users_2->photo))
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/placeholder.png" alt="Card image cap">
                            @else
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/{{$users_2->photo}}" alt="Card image cap">
                            @endif

                            <h6>{{$users_2->name}}</h6>
                            <p>Working session 3</p>

                            @if(Auth::user()->role == 'admin')
                                <div class="box-footer">
                                    <a href="{{action('Users\UsersController@edit', $users_2->uid)}}" class="edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <a href="javascript:void();" class="delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>

                @endif

                @if ($users_2->uid == 353 || $users_2->uid == 363 || $users_2->uid == 287 || $users_2->uid == 16 )

                    <div class="col-md-4 mt-4">

                        <div class="box text-center">

                            @if (empty($users_2->photo))
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/placeholder.png" alt="Card image cap">
                            @else
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/{{$users_2->photo}}" alt="Card image cap">
                            @endif

                            <h6>{{$users_2->name}}</h6>
                            <p>Working session 6</p>

                            @if(Auth::user()->role == 'admin')
                                <div class="box-footer">
                                    <a href="{{action('Users\UsersController@edit', $users_2->uid)}}" class="edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <a href="javascript:void();" class="delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>

                @endif

                @if ($users_2->uid == 4 || $users_2->uid == 213)

                    <div class="col-md-4 mt-4">

                        <div class="box text-center">

                            @if (empty($users_2->photo))
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/placeholder.png" alt="Card image cap">
                            @else
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/{{$users_2->photo}}" alt="Card image cap">
                            @endif

                            <h6>{{$users_2->name}}</h6>
                            <p>Opening Ceremony</p>

                            @if(Auth::user()->role == 'admin')
                                <div class="box-footer">
                                    <a href="{{action('Users\UsersController@edit', $users_2->uid)}}" class="edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <a href="javascript:void();" class="delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>

                @endif

                @if ($users_2->uid == 99 || $users_2->uid == 169 || $users_2->uid == 169)

                    <div class="col-md-4 mt-4">

                        <div class="box text-center">

                            @if (empty($users_2->photo))
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/placeholder.png" alt="Card image cap">
                            @else
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/{{$users_2->photo}}" alt="Card image cap">
                            @endif

                            <h6>{{$users_2->name}}</h6>
                            <p>Goodwill Messages by Industry Partners</p>

                            @if(Auth::user()->role == 'admin')
                                <div class="box-footer">
                                    <a href="{{action('Users\UsersController@edit', $users_2->uid)}}" class="edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <a href="javascript:void();" class="delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>

                @endif

                @if ($users_2->uid == 106)

                    <div class="col-md-4 mt-4">

                        <div class="box text-center">

                            @if (empty($users_2->photo))
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/placeholder.png" alt="Card image cap">
                            @else
                                <img class="img-fluid afraa-logo" src="{{ asset('images') }}/{{$users_2->photo}}" alt="Card image cap">
                            @endif

                            <h6>{{$users_2->name}}</h6>
                            <p>Working Session 4</p>

                            @if(Auth::user()->role == 'admin')
                                <div class="box-footer">
                                    <a href="{{action('Users\UsersController@edit', $users_2->uid)}}" class="edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <a href="javascript:void();" class="delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>

                @endif

            @endforeach

        </div>
    </section>

@endsection
