@extends('layouts.app')

@section('title', 'Speaker')

@section('content')

@php
    //dd($speakers);
@endphp

<div class="row">
    <div class="col-md-12 heading">
        <h1 class="page-header">All Speakers</h1>
        <p></p>
    </div>
</div>

<section id="speksponexib" class="speaker">
        <div class="row">
            @foreach($speakers as $index => $speaker)

                @if ($index % 3 == 0)
                        </div>
                    <div class="row mb-4">
                @endif


                <div class="col-md-4">

                    <div class="box text-center">

                        <img class="img-fluid afraa-logo" src="{{ asset('images') }}/{{$speaker->photo}}" alt="Card image cap">

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
        </div>
    </section>

@endsection
