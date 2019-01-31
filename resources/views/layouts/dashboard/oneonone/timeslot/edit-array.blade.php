@extends('layouts.app')
@section('title', 'One On One Meetings')

@section('content')

    <div class="row mb-4">
        <div class="col-md-12 heading">
            <h3 class="page-header"> @yield('title')</h3>
            <p>Use the form below to edit <b class="font-italic text-primary">{{ isset($timeslots->slug) ? $timeslots->slug : 'this' }}</b> timeslot.</p>
            <a href="{{ route('tables.index') }}" class="btn btn-afraa-full-2 float-right ml-3"><i class="fas fa-arrow-left"></i> Go Back</a>
            <a href="{{ route('oneonone.meetings') }}" class="btn btn-afraa-full-2 float-right">Meetings</a>
        </div>
    </div>

    @php
        $first = head($timeslots['time']['multi_time']);
        $last = last($timeslots['time']['multi_time']);
        $step = count($timeslots['time']['multi_time']);
        
        $from_time = Carbon\Carbon::parse(
            $first[0] .
            $first[1] .
            $first[2] .
            $first[3] .
            $first[4]
        )->format('H:i');
        $to_time = Carbon\Carbon::parse(
            $last[8] .
            $last[9] .
            $last[10] .
            $last[11] .
            $last[12]
        )->format('H:i');

        $from_time_mins = Carbon\Carbon::parse(
            $first[8] .
            $first[9] .
            $first[10] .
            $first[11] .
            $first[12]
        )->format('H:i');

        $step = Carbon\Carbon::parse($from_time)->diffInMinutes($from_time_mins);

    @endphp

    <form enctype="multipart/form-data" method="POST" action="{{route('timeslots.update',$timeslots->id)}}" >
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <b class="text-primary">From:</b>
                    <input type="time" class="form-control timeslot_from" id="from" name="from" value="{{ old('from') ? old('from') : $from_time }}">
                    @if ($errors->has('from'))
                        <small class="text-sm-left text-danger" role="alert">
                            <strong>{{ $errors->first('from') }}</strong>
                        </small>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <b class="text-primary">To:</b>
                    <input type="time" class="form-control timeslot_to" id="to" name="to" value="{{ old('to') ? old('to') : $to_time }}">
                    @if ($errors->has('to'))
                        <small class="text-sm-left text-danger" role="alert">
                            <strong>{{ $errors->first('to') }}</strong>
                        </small>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <b class="text-primary">Enter a step here (Minutes):</b>
                    <input type="number" class="form-control" id="step" name="step" value="{{ old('step') ? old('step') : $step }}" placeholder="Enter a step here (Minutes)">
                    @if ($errors->has('step'))
                        <small class="text-sm-left text-danger" role="alert">
                            <strong>{{ $errors->first('step') }}</strong>
                        </small>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-afraa-full-2 mb-2">Update</button>
            </div>
        </div>
    </form>

@endsection