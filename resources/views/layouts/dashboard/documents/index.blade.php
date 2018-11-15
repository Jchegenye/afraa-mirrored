@extends('layouts.app')

@section('title', 'Documents')

@section('content')

@php
    $role = Auth::user()->role;
@endphp

@if ( $role == "admin" )
    <a href="{{action('DocumentController@create')}}" class="">Add Document</a>
    <br/>
@endif

@foreach ($documents as $document)
    {{$document->title}}
    <br/>
    {{$document->category}}
    <br/>
    {{$document->year}}
    <br/>
    {{ asset('images/documents/') }}/{{$document->name}}
@endforeach

@endsection
