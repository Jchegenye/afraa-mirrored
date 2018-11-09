@extends('layouts.app')

@section('title', 'Speaker')

@section('content')

@php

    $sessions_title = [];
    $sessions_description = [];

    $i = 0;

    if(count($speakers) > 1){

        foreach ($speakers as $key => $speaker){

            $sessions_title[$i] = $speaker->title;
            $sessions_description[$i] = $speaker->description;

            $speakers = $speaker;

        }

        $i++;

    }else{

        foreach ($speakers as $key => $speaker){
            $speakers = $speaker;
        }

    }
    //dd($sessions_title);
    //dd($sessions_description);
@endphp

<div class="row">
    <div class="col-md-12 heading">
        <h1 class="page-header">All Speakers</h1>
        <p></p>
    </div>
</div>
<div class="row pt-4">
    <div class="card-deck col-md-12">
            <div class="card">
            <img class="card-img-top" src="{{ asset('images') }}/Delegates Profile Pic.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$speakers->name}}</h5>
                <p class="card-text">{{$speakers->title}}</p>
            </div>
            </div>
      </div>
</div>

@endsection
