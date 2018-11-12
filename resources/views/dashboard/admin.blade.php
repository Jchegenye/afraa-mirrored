@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>


                {{-- @foreach($session as $sessions)

                    {{$sessions['id']}}
                    {{$sessions['title']}}
                    {{$sessions['description']}}
                    {{$sessions['venue']}}
                    {{$sessions['speaker_id']}}
                    {{$sessions['moderator_id']}}
                    {{$sessions['start_time']}}
                    {{$sessions['end_time']}}
                    {{$sessions['date']}}

                    <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions['id'])}}" class="btn btn-warning">Edit</a>
                    <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                @endforeach

                <div class="row">
                    @foreach($users as $user)
                        {{$user->uid}}
                        {{$user->name}}
                        {{$user->email}}
                        {{$user->role}}
                    @endforeach
                </div>

                <div class="row">
                    @foreach($user_by_id as $get_user)
                        {{$get_user->uid}}
                        {{$get_user->name}}
                        {{$get_user->email}}
                        {{$get_user->role}}
                    @endforeach
                </div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> --}}
            </div>
        </div>

    </div>
</div>
@endsection
