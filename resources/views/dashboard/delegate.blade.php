@extends('layouts.app')

@section('title', 'Delegate')

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
    <div class="col-md-7 mr-0  pr-0"><img class="img-fluid rounded" src="{{ asset('images/wires.png') }}" alt="wires"></div>
    <div class="col-md-5 ml-0 cardgrey">
        <div class="card p-3 border-0">
            <div class="card-title pl-3"><p>Lorem Ipsum Dolor Sitam Etation<p></div>
            <div class="card-body rounded text-white">
                <div class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis  ostrud exerci tation</div>
                <div class="card-footer p-1 mt-3">
                    <span>2th Nov 2018   <span class="pl-2">1400hrs</span> <span class="pl-4">Add to calender<i class="fas fa-briefcase pl-2"></i></span> </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4 pl-2 pt-4 mb-4 scroll_cards">
    <div class="owl-carousel owl-theme pt-4">
        @foreach($session as $sessions)
            <div class="item" data-hash="zero">
                <div class="card shadow-all" style="background-image: url({{ asset('images/Programmes1.png') }});">
                    <div class="card-body p-3 pt-4 align-self-center">
                        <div class="card-title"><strong>{{$sessions['title']}}</strong></div>
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

                            <form class="" method="post" action="{{url('programme')}}" enctype="multipart/form-data">
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
</div>

@endsection
