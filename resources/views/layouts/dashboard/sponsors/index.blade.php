@extends('layouts.app')

@section('title', 'Speaker')

@section('content')

@php
    //dd($sponsors);
@endphp

<div class="row">
    <div class="col-md-12 heading">
        <h1 class="page-header">All sponsors</h1>
        <p></p>
    </div>
</div>

<img src="{{url('/images/sponso.png')}}" alt="Image" class="img-fluid"/>
{{-- <div class="row pt-4">
    <div class="card-deck col-md-12">
        @php
            $i= 0;
        @endphp
        @foreach($sponsors as $speaker)
            @php
                $i++;
            @endphp
            <div class="card">
            <img class="card-img-top" src="{{ asset('images') }}/{{$speaker->photo}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$speaker->name}}</h5>
                <p class="card-text">{{$speaker->title}}</p>
                <a href="{{action('Speaker\SpeakerController@show',$speaker->uid)}}">Read More</a>
            </div>
            </div>
            @if ($i%3==0)
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="card-deck col-md-12">
            @endif
        @endforeach
      </div>
</div> --}}

@endsection
