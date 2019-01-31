@extends('layouts.app')
@section('title', 'One On One Meetings')

@section('content')

<section id="allmeetings">
    
    <div class="row mb-4">
        <div class="col-md-12 heading">
            <h3 class="page-header"> @yield('title')</h3>
            <a href="{{ route('tables.index') }}" class="btn btn-afraa-full-2 float-right ml-3"><i class="fas fa-arrow-left"></i> Go Back</a>
            <a href="{{ route('oneonone.meetings') }}" class="btn btn-afraa-full-2 float-right">Meetings</a>
            
        </div>
    </div>

    <div class="table-bordered mb-5">
        <div class="col-md-12">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img class="img-fluid" src="{{ asset('images') . "/tables/" . $tables->image_name }}" alt="{{$tables->company}}">
                </div>
                <div class="col-md-9">
                    <div class="">
                        <small><b class="text-primary">Company:</b> {{ $tables->company }}</small><br>
                        <small><b class="text-primary">Name:</b> {{ $tables->name }}</small><br>
                        <small><b class="text-primary">Position:</b> {{ $tables->position }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="mb-2">List of all meetings booked for <label  class="text-primary">{{ $tables->company }}</label></p>
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Time</th>
                <th>Name</th>
                <th>Position</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($oneononesingletable['oneononesingletable'] as $singletable)
                <tr>
                    
                    @foreach ($oneononesingletimeslot['oneononesingletimeslot'] as $slots)

                        @if ($singletable->timeslot_id == $slots->timeslot_id)
                            <td><b>{{$slots->time}}</b></td>

                            @foreach ($delegateprofile['delegateprofile'] as $user)
                                @if ($user->uid == $slots->delegate_id)
                                    <td><b>{{$user->name}}</b></td>
                                    <td><b>{{$user->Company_Name}}</b></td>
                                    <td><b>{{$user->Job_Title}}</b></td>
                                @endif
                            @endforeach

                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


</section>
    
    
@endsection