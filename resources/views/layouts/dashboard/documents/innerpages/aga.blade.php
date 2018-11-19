@extends('layouts.app')

@section('title', 'Documents Categories')

@section('content')

@php
    $role = Auth::user()->role;
@endphp

<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">ANNUAL GENERAL ASSEMBLY</h3>

        @if ( $role == "admin" )
            <a href="{{action('DocumentController@create')}}" class="">Add Document</a>
            <br/>
        @endif
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12 annual">

        @foreach ($documents as $document)
            <a href="{{url('/single/aga',$document->year)}}" class="aga mb-4">
                <img src="{{URL::asset('/images/logo.png')}}" alt="" class="img-fluid col-md-2">
                <span class="col-md-10">50<sup>th</sup> AGA ({{$document->year}}) </span>
            </a>
        @endforeach

    </div>
</div>

@endsection
