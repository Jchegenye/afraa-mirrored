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
<div class="row pt-4">
    <div class="card-deck col-md-12">
        @foreach($speakers as $speaker)
            <div class="card">
            <img class="card-img-top" src="{{ asset('images') }}/Delegates Profile Pic.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$speaker->name}}</h5>
                <p class="card-text">{{$speaker->title}}</p>
                <a href="{{action('Speaker\SpeakerController@show',$speaker->uid)}}">Read More</a>
            </div>
            </div>
        @endforeach
      </div>
</div>

@endsection
