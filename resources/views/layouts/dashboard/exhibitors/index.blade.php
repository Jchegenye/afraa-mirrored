@extends('layouts.app')

@section('title', 'Speaker')

@section('content')

@php
    //dd($users);
@endphp

<div class="row">
    <div class="col-md-12 heading">
        <h1 class="page-header">All Exhibitors</h1>
        <p></p>
    </div>
</div>
<img src="{{url('/images/exhibitor.png')}}" alt="Image" class="img-fluid"/>
<div class="row pt-4">
    <div class="card-deck col-md-12">
        @php
            $i= 0;
        @endphp
        @foreach($users as $user)
            @php
                $i++;
            @endphp
            <div class="card">
                <img class="card-img-top" src="{{ asset('images') }}/{{$user->photo}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}}</h5>
                    <p class="card-text">{{$user->title}}</p>
                    <a href="{{action('Exibitor\ExibitorController@show',$user->uid)}}">Read More</a>
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
</div>

@endsection
