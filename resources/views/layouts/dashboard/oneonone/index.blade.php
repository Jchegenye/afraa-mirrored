@extends('layouts.app')
@section('title', 'One On One Meetings')

@section('content')

    @if(Auth::user()->role == 'admin')

        @include('layouts.dashboard.oneonone.inner.manage-tables')

    @endif
    
@endsection