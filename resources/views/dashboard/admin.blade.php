@extends('layouts.app')

@section('title', 'Dashboard')

@php
    //dd($statistics);
@endphp

@section('content')

    <div class="container-fluid">

        <div id="statistics" class="text-center">

            @php $roles = ''; @endphp
                @foreach ($users as $user)

                    @php $roles .= $user->role; @endphp
                    {{-- {{
                        $user->role
                    }} --}}

                @endforeach
            @php $role = $roles; @endphp

                <div class="row">

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>{{$statistics['managers']}}</h1>
                                <h6>Manager</h6>

                                <a href="{{url('/dashboard/admin/managers')}}" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>{{$statistics['delegates']}}</h1>
                                <h6>DELEGATES</h6>

                                <a href="{{url('/dashboard/admin/delegates')}}" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>{{$statistics['sponsors']}}</h1>
                                <h6>SPONSORS</h6>

                                <a href="{{url('/dashboard/sponsors')}}" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>{{$statistics['speakers']}}</h1>
                                <h6>SPEAKERS</h6>

                                <a href="{{url('/dashboard/delegate/speakers')}}" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>{{$statistics['exhibitors']}}</h1>
                                <h6>EXHIBITORS</h6>

                                <a href="{{url('/dashboard/delegate/exhibitors')}}" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                </div>

        </div>

    </div>

@endsection
