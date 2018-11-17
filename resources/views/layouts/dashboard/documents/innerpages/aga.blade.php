@extends('layouts.app')

@section('title', 'Documents Categories')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">ANNUAL GENERAL ASSEMBLY</h3>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12 annual">

        @foreach ($documents as $document)
            <a href="{{url('/single/aga',$document->year)}}" class="aga mb-4">
                <img src="{{URL::asset('/images/logo.png')}}" alt="" class="img-fluid col-md-2">
                <span class="col-md-10">47TH AGA ({{$document->year}}) </span>
            </a>
        @endforeach

    </div>
</div>

@endsection
