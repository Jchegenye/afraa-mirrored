@extends('layouts.app')

@section('title', 'Documents')

@section('content')

@php
    //dd($documents);
@endphp

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
