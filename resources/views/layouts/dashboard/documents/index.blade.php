@extends('layouts.app')

@section('title', 'Documents')

@section('content')

@php
    $role = Auth::user()->role;
@endphp

<hr>

    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                @if (Auth::user()->role == "admin")
                    Uploads
                @else
                    Downloads
                @endif
            </h3>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">

            <a href="{{url('dashboard/delegate/aga')}}" class="aga">
                <img src="{{URL::asset('/images/logo2.png')}}" alt="" class="img-fluid col-md-2">
                <span class="col-md-10">ANNUAL GENERAL ASSEMBLY</span>
            </a>

            <a href="{{url('dashboard/delegate/asc')}}" class="aga aviation mt-4">
                <img src="{{URL::asset('/images/asc-logo.jpg')}}" alt="" class="img-fluid col-md-2">
                <span class="col-md-10">AVIATION STAKEHOLDERS CONVENTION</span>
            </a>

        </div>
    </div>

@endsection
