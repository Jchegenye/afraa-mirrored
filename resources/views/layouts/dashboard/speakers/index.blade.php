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
{{--
<img src="{{url('/images/speakers1.png')}}" alt="Image" class="img-fluid"/>  --}}
<div class="row pt-4">
    <div class="card-deck col-md-12">
        @php
            $i= 0;
        @endphp
        @foreach($speakers as $speaker)
            @php
                $i++;
            @endphp
            <div class="card">
            <img class="card-img-top" src="{{ asset('images') }}/{{$speaker->photo}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$speaker->name}}</h5>
                <p class="card-text">{{$speaker->title}}</p>

                @if(Auth::user()->role == 'admin')
                    <a href="{{action('Users\UsersController@edit', $speaker->uid)}}">Edit</a>
                    <a href="{{url('dashboard/admin/delete_speaker/')}}/{{$speaker->id}}/{{$speaker->uid}}">Delete</a>
                @endif

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
