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
<div class="row pt-4">
    <div class="card-deck col-md-12">
        @foreach ($users as $user)
            <div class="card">
            <img class="card-img-top" src="{{ asset('images') }}/{{$user->photo}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text">{{$user->title}}</p>
                <p class="card-text">{{$user->bio}}</p>
            </div>
            </div>
        @endforeach
      </div>
</div>

@endsection
