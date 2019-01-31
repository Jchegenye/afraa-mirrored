@extends('layouts.app')
@section('title', 'One On One Meetings')

@section('content')

    @if(Auth::user()->role == 'admin')
        
        @include('layouts.dashboard.oneonone.inner.all-meetings')

    @elseif(Auth::user()->role == 'delegate')

        @include('layouts.dashboard.oneonone.inner.schedule-meetings')

    @endif

@endsection