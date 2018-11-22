@extends('layouts.app')

@section('title', 'Dashboard/Admin/Session/edit')

@section('content')

<div id="adminTable">

    <div class="table_header">
        <div class="row">
            <div class="col-md-4">
                <div class="mx-auto mt-2 intro1">
                    <h6 class="text-capitalize">{{ __('Edit Session') }}</h6>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{url()->previous()}}" class="btn btn-afraa tb-sm-text">
                            <i class="fas fa-arrow-left pr-2"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table_body">
        <form class="" method="post" action="{{action('ProgrammeSession\ProgrammeSessionController@update', $session->id)}}">
            @csrf
            
            @if (\Session::has('success'))
                <div class="alert alert-success px-5">
                    {!! \Session::get('success') !!}
                </div>
            @endif

            <div class="row">

                <input name="_method" type="hidden" value="PATCH">

                <div class="col-md-6 form-group ">
                    <label for="title" class="col-form-label text-md-right">{{ __('Title:') }}</label>
                    <input type="text" class="form-control" name="title" value="{{$session->title}}">
                </div>

                <div class="col-md-6 form-group ">
                    <label for="email">Description</label>
                    <textarea class="form-control" name="description" rows="5">{{$session->description}}</textarea>
                </div>

                <div class="col-md-6 form-group ">
                    <label for="number">Speaker / Moderator:</label>

                    <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="user_id">
                            <option value="0" selected>Choose Option</option>
                            @foreach( $users as $user )
                                <option data-subtext ="{{ $user->name }}" value="{{ $user->uid }}" >{{ $user->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-md-6 form-group ">
                    <div class="form-group col-md-12">
                        <p>Session Type:</p>
                        @php
                            $session_types = ["Master of Ceremony","Moderator","Speaker"];
                            $i=0;
                        @endphp
                        @foreach( $session_types as $session_type )
                        <input type="radio" name="session_type" value="{{ $session_types[$i] }}"
                                @if ($session_types[$i] === $session->session_type)
                                    checked
                                @endif
                            >
                            @if ($session_types[$i] === $session->session_type)
                                {{ $session->session_type}}
                            @else
                                {{$session_types[$i]}}
                            @endif
                        </option>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 form-group ">
                    <label for="number">Start Time:</label>
                    <input type="text" class="form-control start_time" name="start_time" value="{{$session->start_time}}">
                </div>
                <div class="col-md-6 form-group ">
                    <label for="number">End Time:</label>
                    <input type="text" class="form-control start_time" name="end_time" value="{{$session->end_time}}">
                </div>
                <div class="col-md-6 form-group ">
                    <label for="number">Day:</label>

                    <select class="form-control date" name="date">
                        @php
                            $dates = ["2018-10-25","2018-10-26","2018-10-27"];
                            $i=0;
                        @endphp

                        @foreach( $dates as $date )

                            <option value="{{ $dates[$i] }}"
                                @if ($dates[$i] === $session->date)
                                    selected="selected"
                                @endif
                                >
                                @if ($dates[$i] == "2018-10-25")
                                    Day One
                                @elseif($dates[$i] == "2018-10-26")
                                    Day Two
                                @elseif($dates[$i] == "2018-10-27")
                                    Day Three
                                @endif
                            </option>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group align-self-end">
                    <button type="submit" class="btn btn-afraa-full-2 mb-2">Update</button>
                </div>
                
            </div>

        </form>
    </div>

    </div>

</div>

        {{-- <form class="shadow mt-5" method="post" action="{{action('ProgrammeSession\ProgrammeSessionController@update', $session->id)}}">
            @csrf
            <div class="form-row heading p-5">
                <h5>{{ __('Edit Session') }}</h5>
                <p></p>
            </div>
            @if (\Session::has('success'))
                <div class="alert alert-success px-5">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            <div class="p-5">
                <input name="_method" type="hidden" value="PATCH">
                <div class="row form-row pt-3 pb-4">
                    <label for="name">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{$session->title}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="email">Description</label>
                    <textarea class="form-control" name="description" rows="5">{{$session->description}}</textarea>
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">Speaker / Moderator:</label>
                    <select class="form-control" name="user_id">
                        @foreach( $users as $user )
                            <option value="{{ $user->uid }}"
                                @if ($user->uid === $session->user_id)
                                    selected="selected"
                                @endif
                            >{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row pt-3 pb-4">
                    <div class="form-group col-md-12">
                        <p>Session Type:</p>
                        @php
                            $session_types = ["moderator","speaker"];
                            $i=0;
                        @endphp
                        @foreach( $session_types as $session_type )
                        <input type="radio" name="session_type" value="{{ $session_types[$i] }}"
                                @if ($session_types[$i] === $session->session_type)
                                    checked
                                @endif
                            >
                            @if ($session_types[$i] === $session->session_type)
                                {{ $session->session_type}}
                            @else
                                {{$session_types[$i]}}
                            @endif
                        </option>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">start_time:</label>
                    <input type="text" class="form-control start_time" name="start_time" value="{{$session->start_time}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">end_time:</label>
                    <input type="text" class="form-control start_time" name="end_time" value="{{$session->end_time}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">Day:</label>

                    <select class="form-control date" name="date">
                        @php
                            $dates = ["2018-10-25","2018-10-26","2018-10-27"];
                            $i=0;
                        @endphp

                        @foreach( $dates as $date )

                            <option value="{{ $dates[$i] }}"
                                @if ($dates[$i] === $session->date)
                                    selected="selected"
                                @endif
                                >
                                @if ($dates[$i] == "2018-10-25")
                                    Day One
                                @elseif($dates[$i] == "2018-10-26")
                                    Day Two
                                @elseif($dates[$i] == "2018-10-27")
                                    Day Three
                                @endif
                            </option>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </select>
                </div>
                <div class="row form-row pt-3 pb-4">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form> --}}

@endsection
