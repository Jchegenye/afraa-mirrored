@extends('layouts.app')

@section('title', 'Delegate')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">Dashboard</h3>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">

            <div class="delegate-box afraa-white-box ">
                <table class="table">
                    <tr>
                        <th>
                            <h6 class="afraa-red-text">CURRENT SESSION</h6>
                        </th>
                        <td>
                            <div class="afraa-red-box">
                                <span>9:00 - 15: 00</span>
                                <span>Chairman’s Opening Remarks</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h6>CURRENT SESSION</h6>
                        </th>
                        <td>
                            <div class="afraa-white-box ">
                                <span>9:00 - 15: 00</span> 
                                <span>Delegates Tour</span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <h6>Register for the next event</h6>

            <div class="row mt-4">
                <div class="col-md-5">
                    <div class="delegate-box-reg afraa-white-box text-center afraa-box-inactive">
                        <img src="{{URL::asset('/images/logo.png')}}" alt="">
                        <h6 class="afraa-red-text">ANNUAL GENERAL ASSEMBLY </h6>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="delegate-box-reg afraa-white-box text-center"  data-toggle="modal" data-target="#modal-1">
                        <img src="{{URL::asset('/images/asc-logo.jpg')}}" alt="">
                        <h6 class="afraa-red-text">AVIATION STAKEHOLDERS CONVENTION</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade afraa-medal" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="modal-1Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title afraa-red-text text-600" id="exampleModalLongTitle">POLITE NOTICE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    To successfully register ensure your profile is up to date.
                </div>
                <div class="modal-footer-1">
                    <a href="{{'#'}}" class="btn btn-afraa-full">Proceed To Profile</a>
                </div>
            </div>
        </div>
    </div>

{{-- <div class="row">
    <div class="col-md-9 heading">
        <h1 class="page-header">All Sessions</h1>
        <p>{{ __('Add a New User and assign a specific role with certain permissions') }}</p>
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
</div> --}}

{{-- <div class="row pt-4">
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

                            <form class="" method="post" action="{{url('dashboard/delegate/programme')}}" enctype="multipart/form-data">
                                @csrf
                                <input name="session_id" type="hidden" value=" {{$featured_sessions->id}}">
                                <button class="btn btn-link text-white text-small" role="link" type="submit">Add to calender<i class="fas fa-briefcase pl-2"></i></button>
                            </form>

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
                <div class="card shadow-all" style="background-image: url({{ asset('images/') }}/{{$sessions['featured_image']}});">
                    <div class="card-body p-3 pt-4 align-self-center">
                        <div class="card-title text-capitalize"><strong>{{$sessions['title']}}</strong></div>
                        <div class="card-text text-justify">{{$sessions['description']}}</div>
                        <div class="card-footer p-0 border-0">

                            @php
                                $date = date("j F, Y", strtotime($sessions['date']));
                                $start_time = date("h:i:sa", strtotime($sessions['date']));
                            @endphp
                            {{$date}}
                            <span class="pl-3 pr-3">
                                {{$start_time}}
                            </span>

                            <form class="" method="post" action="{{url('dashboard/delegate/programme')}}" enctype="multipart/form-data">
                                @csrf
                                <input name="session_id" type="hidden" value=" {{$sessions['id']}}">
                                <button class="btn btn-link text-white text-small" role="link" type="submit">Add to calender<i class="fas fa-briefcase pl-2"></i></button>
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
<div class="row mt-4 pt-4 mb-4 scroll_cards">
    <div class="col-md-12 heading pb-3">
        <h1>My Programmes</h1>
        <p>Add a New User and assign a specific role with certain permissions </p>
    </div>
    @foreach($programme as $programmes)
        <div class="col-md-4">
            <div class="card shadow-all" style="background-image: url({{ asset('images/programme3.png') }});">
                <div class="card-body p-3 pt-4">
                    <div class="card-title"><strong>{{$programmes->title}}</strong></div>
                    <div class="card-text text-justify">{{$programmes->description}}</div>
                    <div class="card-footer p-0 border-0">
                        @php
                            $date = date("j F, Y", strtotime($programmes->date));
                            $start_time = date("h:i:sa", strtotime($programmes->date));
                        @endphp
                        {{$date}}
                        <span class="pl-3 pr-3">
                            {{$start_time}}
                        </span>

                        <form class="text-left" action="{{action('Programme\ProgrammeController@destroy', $programmes->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-link text-white text-small" role="link" type="submit">Remove<i class="fas fa-trash pl-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}

@endsection
