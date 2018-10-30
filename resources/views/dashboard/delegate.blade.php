@extends('layouts.app')

@section('title', 'Delegate')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-1">
            @include('layouts.sidebar')
        </div>

        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Delegate</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            <div class="row">
                    <h2>All Sessions</h2>
                @foreach($session as $sessions)

                    {{$sessions['id']}}
                    {{$sessions['title']}}
                    {{$sessions['description']}}
                    {{$sessions['venue']}}
                    {{$sessions['speaker_id']}}
                    {{$sessions['moderator_id']}}
                    {{$sessions['start_time']}}
                    {{$sessions['end_time']}}
                    {{$sessions['date']}}

                    <form method="post" action="{{url('programme')}}" enctype="multipart/form-data">
                        @csrf
                        <input name="session_id" type="hidden" value=" {{$sessions['id']}}">
                        <button class="btn btn-danger" type="submit">Add to Agenda</button>
                    </form>
                @endforeach
            </div>

            <div class="row">
                    <h2>My Programme</h2>
                    @foreach($programme as $programmes)

                    {{$programmes['id']}}
                    {{$programmes['title']}}
                    {{$programmes['description']}}
                    {{$programmes['venue']}}
                    {{$programmes['speaker_id']}}
                    {{$programmes['moderator_id']}}
                    {{$programmes['start_time']}}
                    {{$programmes['end_time']}}
                    {{$programmes['date']}}


                    {{-- <a href="{{action('Programme\ProgrammeController@edit', $programmes['id'])}}" class="btn btn-warning">Edit</a> --}}
                    <form action="{{action('Programme\ProgrammeController@destroy', $programmes['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Remove</button>
                    </form>

                  @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
