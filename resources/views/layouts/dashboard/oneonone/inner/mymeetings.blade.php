@extends('layouts.app')
@section('title', 'One On One Meetings')

@section('content')

<div class="row mb-4">
    <div class="col-md-12 heading">
        <h3 class="page-header"> @yield('title')</h3>
        <p>
            <span class="badge badge-primary">
                {{$oneononemymeetingcount}}
            </span> scheduled meeting's
        </p>
        <a href="{{ route('oneonone.meetings') }}" class="btn btn-afraa-full-2 float-right"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>
</div>

<section id="allmeetings">
    <div class="row">
        <section class="col col-lg-12 meetingsinfo clearfix">
            <table class="table table-hover table-striped" id="all-meetings">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Add to Calendar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($oneononetables as $tables)

                        <tr>
                            
                            @foreach ($oneononetimeslots as $slots)
                                @if ($tables->timeslot_id == $slots->timeslot_id)
                                    <td><b>{{$slots->time}}</b></td>
                                @endif
                            @endforeach

                            <td><b>{{$tables->name}}</b></td>
                            <td><b>{{$tables->position}}</b></td>
                            <td><b>{{$tables->company}}</b></td>
                            <td>
                            
                            <div title="Add to Calendar" class="addeventatc" style="box-shadow: none !important; background: transparent;">
                                @foreach ($oneononetimeslots as $slots)
                                    @if ($tables->timeslot_id == $slots->timeslot_id)

                                        <span class="start">{{$slots->date}} {{substr($slots->time,0,5)}}  </span>
                                        <span class="end">{{$slots->date}} {{substr($slots->time,8)}}  </span>
                                        <span class="timezone">Greenwich Mean Time</span>
                                        <span class="title">One on One Meeting - {{$tables->company}}</span>
                                        <span class="description">
                                            {{$tables->name}}
                                            {{$tables->position}}
                                            {{$tables->company}}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</section>

@endsection