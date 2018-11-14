
@php
//dd($featured_session);
@endphp

@extends('layouts.app')

@section('title', 'Dashboard/Admin/Session/view')

@section('content')

<div class="row">
        <div class="col-md-9 heading">
            <h1 class="page-header">All Programmes</h1>
            <p>Add a New User and assign a specific role with certain permissions</p>
        </div>
        <div class="col-md-3">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control bg-danger text-white rounded-left" placeholder="Search">
                <span class="input-group-btn border-0">
                <button class="btn btn-default bg-danger text-white rounded-right" type="button">
                    <i class="fa fa-search"></i>
                </button>
                </span>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($featured_session as $featured_sessions)
            <div class="col-md-7 mr-0  pr-0"><img class="img-fluid rounded w-100" src="{{ asset('images') }}/{{$featured_sessions->featured_image}}" alt="wires"></div>
            <div class="col-md-5 ml-0 cardgrey">
                <div class="card p-3 border-0">
                    <div class="card-title pl-3 text-capitalize"><p>{{$featured_sessions->title}}<p></div>
                    <div class="card-body rounded text-white">
                        <div class="card-text">{{$featured_sessions->description}}</div>
                        <div class="card-footer p-1 mt-3">
                            @php
                                $date = date("j F, Y", strtotime($featured_sessions->date));
                                $start_time = date("h:i:sa", strtotime($featured_sessions->date));
                            @endphp
                            <span>

                                {{$date}}
                                <span class="pl-2">
                                    {{$start_time}}
                                </span>
                                <span class="pl-4">



                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-4 pl-2 pt-4 mb-4 scroll_cards">
        <div class="owl-carousel owl-theme pt-4">
            @foreach($session as $sessions)
                <div class="item" data-hash="zero">
                    <div class="card shadow-all" style="background-image: url({{ asset('images') }}/{{$sessions['featured_image']}});">
                        <div class="card-body p-3 pt-4 align-self-center">
                            <div class="card-title text-capitalize"><strong>{{$sessions['title']}}</strong></div>
                            <div class="card-text text-justify">{{$sessions['description']}}</div>
                            <div class="card-footer p-0 border-0">

                                <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions['id'])}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <p>
                                    @php
                                        $date = date("j F, Y", strtotime($sessions['date']));
                                        $start_time = date("h:i:sa", strtotime($sessions['date']));
                                    @endphp
                                    {{$date}}
                                    <span class="pl-3 pr-3">
                                        {{$start_time}}
                                    </span>
                                    <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions['id'])}}" class="btn btn-link text-white text-small">Edit</a>
                                    <button class="btn btn-link text-white text-small" type="submit">Delete</button>
                                    </p>
                                </form>

                                <form action="{{url('dashboard/admin/featured_session')}}" method="post">
                                    @csrf
                                    <input name="session_id" type="hidden" value="{{$sessions['id']}}">
                                    <button class="btn btn-link text-white text-small" type="submit">{{__('Set As Featured')}}</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
          @endforeach
        </div>
        <div class="owl-navi mx-auto">
            <a class="button secondary url" href="#zero">1</a>
            <a class="button secondary url" href="#one">2</a>
            <a class="button secondary url" href="#two">3</a>
            <a class="button secondary url" href="#three">4</a>
        </div>
    </div>

    @if (\Session::has('success'))
        <div class="alert alert-success px-5">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="row">

        <a href="{{ url('/dashboard/admin/session/create') }}" class="btn btn-danger">Add a Session</a>

    </div>

    <div class="row">
        <nav class="col-md-12">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sunday, 25 November 2018</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Monday, 26th November 2018</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tuesday, 27 November 2018</a>
            </div>
        </nav>
        <div class="tab-content col-md-12" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                @foreach($session as $sessions)
                    @php
                        $date = date("j", strtotime($sessions['date']));
                    @endphp
                    @if ($date==25)

                        {{$sessions['title']}}
                        {{$sessions['description']}}
                        {{$sessions['title']}}

                        <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">

                            <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions['id'])}}" class="btn btn-link text-white text-small">Edit</a>
                            <button class="btn btn-link text-white text-small" type="submit">Delete</button>

                        </form>

                        <form action="{{url('dashboard/admin/featured_session')}}" method="post">
                            @csrf
                            <input name="session_id" type="hidden" value="{{$sessions['id']}}">
                            <button class="btn btn-link text-white text-small" type="submit">{{__('Set As Featured')}}</button>
                        </form>
                    @endif
                    <br/>
                @endforeach
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                @foreach($session as $sessions)
                @php
                    $date = date("j", strtotime($sessions['date']));
                @endphp
                @if ($date==26)

                    {{$sessions['title']}}
                    {{$sessions['description']}}
                    {{$sessions['title']}}

                    <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">

                        <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions['id'])}}" class="btn btn-link text-white text-small">Edit</a>
                        <button class="btn btn-link text-white text-small" type="submit">Delete</button>

                    </form>

                    <form action="{{url('dashboard/admin/featured_session')}}" method="post">
                        @csrf
                        <input name="session_id" type="hidden" value="{{$sessions['id']}}">
                        <button class="btn btn-link text-white text-small" type="submit">{{__('Set As Featured')}}</button>
                    </form>
                @endif
                <br/>
            @endforeach
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                @foreach($session as $sessions)
                @php
                    $date = date("j", strtotime($sessions['date']));
                @endphp
                @if ($date==27)

                    {{$sessions['title']}}
                    {{$sessions['description']}}
                    {{$sessions['title']}}

                    <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">

                        <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions['id'])}}" class="btn btn-link text-white text-small">Edit</a>
                        <button class="btn btn-link text-white text-small" type="submit">Delete</button>

                    </form>

                    <form action="{{url('dashboard/admin/featured_session')}}" method="post">
                        @csrf
                        <input name="session_id" type="hidden" value="{{$sessions['id']}}">
                        <button class="btn btn-link text-white text-small" type="submit">{{__('Set As Featured')}}</button>
                    </form>
                @endif
                <br/>
            @endforeach
          </div>
        </div>
    </div>

@endsection
