
@php
    //dd($session);
@endphp

@extends('layouts.app')

@section('title', 'Dashboard/Admin/Session/view')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">Manage Programmes</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-6">

            <div class="row">
                <div class="col-md-6">
                    {{--  <div class="input-group custom-search-form">
                        <input type="text" class="form-control bg-danger text-white rounded-left" placeholder="Search">
                        <span class="input-group-btn border-0">
                        <button class="btn btn-default bg-danger text-white rounded-right" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                        </span>
                    </div>  --}}
                </div>

                <div class="col-md-6">
                    <a href="{{ url('/dashboard/admin/session/create') }}" class="btn btn-afraa-full-2 add-session">Add a Session</a>
                </div>
            </div>

        </div>
    </div>

    @if (\Session::has('success'))
        <div class="alert alert-success px-5 mt-3">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="row mt-5" id="dashtabs">
        <nav class="col-md-12">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sunday, 25 November 2018</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Monday, 26th November 2018</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tuesday, 27 November 2018</a>
            </div>
        </nav>
        <div class="tab-content col-md-12 mt-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <table class="table">
                    <tbody>

                        @foreach($session as $sessions)

                            @php

                                $date = date("j", strtotime($sessions->date));

                                $start = date("h:i a", strtotime($sessions->start_time));

                                $stop = date("h:i a", strtotime($sessions->end_time));

                            @endphp

                            @if ($date==25)

                                <tr class="tabtable">
                                    <td class="clr-gray">
                                        <div>
                                        <h6>{{$start}} - {{$stop}}</h6>
                                        </div>
                                    </td>
                                    <td class="clr-blk">
                                        <div>
                                            <h6>{{$sessions->title}}</h6>
                                        </div>
                                    </td>
                                    <td class="action-gray">
                                        <div class="editmanagerprog">
                                            <a href="#" data-toggle="modal" data-target="#{{$sessions->title}}"><i class="far fa-eye d-none"></i></a>

                                            <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions->id)}}" class="edit"><i class="far fa-edit"></i></a>

                                            <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions->id)}}" method="post">

                                                @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="text-small" type="submit"><i class="far fa-trash-alt"></i></button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                <div class="afraa-modal">
                                    <div class="modal fade" id="{{$sessions->title}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content p-5">
                                            <div class="modal-header mt-4">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{$sessions->title}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <span class="time_interval">{{$sessions->start_time}} - {{$sessions->end_time}}</span>
                                            <div class="modal-body row">
                                                <div class="col-md-8 left_modal pr-5">
                                                        {{$sessions->description}}
                                                </div>
                                                <div class="col-md-4">
                                                        <img src="{{ asset('images/') }}/{{$sessions->photo}}" classs="img-fluid">
                                                </div>
                                            </div>
                                            <div class="modal-footer d-none">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td class="pt-2"></td>
                                </tr>

                            @endif

                        @endforeach

                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                <table class="table">
                    <tbody>

                        @foreach($session as $sessions)

                            @php

                                $date = date("j", strtotime($sessions->date));

                                $start = date("h:i a", strtotime($sessions->start_time));

                                $stop = date("h:i a", strtotime($sessions->end_time));

                            @endphp

                            @if ($date==26)

                                <tr class="tabtable" data-toggle="modal" data-target="#{{$sessions->title}}">
                                    <td class="clr-gray">
                                        <div>
                                        <h6>{{$start}} - {{$stop}}</h6>
                                        </div>
                                    </td>
                                    <td class="clr-blk">
                                        <div>
                                            <h6>{{$sessions->title}}</h6>
                                        </div>
                                    </td>
                                    <td class="action-gray">
                                        <div class="editmanagerprog">

                                            <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions->id)}}" class="edit"><i class="far fa-edit"></i></a>

                                            <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions->id)}}" method="post">

                                                @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="text-small" type="submit"><i class="far fa-trash-alt"></i></button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pt-2"></td>
                                </tr>

                            @endif

                        @endforeach

                    </tbody>

                </table>

            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                <table class="table">
                    <tbody>

                        @foreach($session as $sessions)

                            @php

                                $date = date("j", strtotime($sessions->date));

                                $start = date("h:i a", strtotime($sessions->start_time));

                                $stop = date("h:i a", strtotime($sessions->end_time));

                            @endphp

                            @if ($date==27)

                                <tr class="tabtable" data-toggle="modal" data-target="#{{$sessions->title}}">
                                    <td class="clr-gray">
                                        <div>
                                        <h6>{{$start}} - {{$stop}}</h6>
                                        </div>
                                    </td>
                                    <td class="clr-blk">
                                        <div>
                                            <h6>{{$sessions->title}}</h6>
                                        </div>
                                    </td>
                                    <td class="action-gray">
                                        <div class="editmanagerprog">

                                            <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions->id)}}" class="edit"><i class="far fa-edit"></i></a>

                                            <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions->id)}}" method="post">

                                                @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="text-small" type="submit"><i class="far fa-trash-alt"></i></button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pt-2"></td>
                                </tr>

                            @endif

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    {{-- <!-- <div class="row pt-4">
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
    </div> -->
    <!-- <div class="row mt-4 pl-2 pt-4 mb-4 scroll_cards">
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
    </div> --> --}}

@endsection