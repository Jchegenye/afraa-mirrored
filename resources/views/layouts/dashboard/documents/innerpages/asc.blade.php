@extends('layouts.app')

@section('title', 'Documents Categories')

@section('content')

@php
    $role = Auth::user()->role;
    //dd($documents);
@endphp

<div class="row">
    <div class="col-md-6">
        <h3 class="page-header">AVIATION STAKEHOLDERS CONVENTION</h3>
    </div>
    <div class="col-md-6 text-right">
        @if ( $role == "admin" )
            <a href="{{action('DocumentController@create')}}" class="btn-afraa-full-2">Add Document</a>
            <br/>
        @endif
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12 annual">

        @foreach ($documents as $document)
            <a href="{{url('dashboard/delegate/single/asc',$document->year)}}" class="aga mb-4">
                <img src="{{URL::asset('/images/logo.png')}}" alt="" class="img-fluid col-md-2">
                <span class="col-md-10">AFRAA ASC 8<sup>th</sup>
                    @if (Auth::user()->role == "admin")
                        Uploads
                    @else
                        Downloads
                    @endif ({{$document->year}})
                </span>
            </a>
        @endforeach

    </div>
</div>

@endsection