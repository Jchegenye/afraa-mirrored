@extends('layouts.app')

@section('title', 'Dashboard/Admin/Session/edit')

@section('content')

        <form class="shadow mt-5" method="post" action="{{action('ProgrammeSession\ProgrammeSessionController@update', $session->id)}}">
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
                    <label for="number">venue:</label>
                    <input type="text" class="form-control" name="venue" value="{{$session->venue}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">speaker:</label>
                    <select class="form-control" name="speaker_id">
                        @foreach( $users as $user )
                            <option value="{{ $user->uid }}"
                                @if ($user->uid === $session->speaker_id)
                                    selected="selected"
                                @endif
                            >{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">moderator:</label>
                    <select class="form-control" name="moderator_id">
                        @foreach( $users as $user )
                            <option value="{{ $user->uid }}"
                                @if ($user->uid === $session->moderator_id)
                                    selected="selected"
                                @endif
                            >{{ $user->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">start_time:</label>
                    <input type="text" class="form-control" name="start_time" value="{{$session->start_time}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">end_time:</label>
                    <input type="text" class="form-control" name="end_time" value="{{$session->end_time}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="number">date:</label>
                    <input type="text" class="form-control" name="date" value="{{$session->date}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>

@endsection
