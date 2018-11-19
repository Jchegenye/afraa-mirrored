@extends('layouts.app')

@section('title', 'Speaker')

@section('content')

@php

    $sessions_title = [];
    $sessions_description = [];

    $i = 0;

    if(count($sponsors) > 1){

        foreach ($sponsors as $key => $speaker){

            $sessions_title[$i] = $speaker->title;
            $sessions_description[$i] = $speaker->description;

            $sponsors = $speaker;

        }

        $i++;

    }else{

        foreach ($sponsors as $key => $speaker){
            $sponsors = $speaker;
        }

    }
    //dd($sponsors);
    //dd($sessions_description);
@endphp

<div class="row">
    <div class="col-md-12 heading">
        <h1 class="page-header">All sponsors</h1>
        <p></p>
    </div>
</div>
<div class="row pt-4">
    <div class="card-deck col-md-12">
            <div class="card">
            <img class="card-img-top" src="{{ asset('images') }}/{{$sponsors->photo}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$sponsors->name}}</h5>
                <p class="card-text">{{$sponsors->title}}</p>
            </div>
            </div>
      </div>
</div>

@endsection
