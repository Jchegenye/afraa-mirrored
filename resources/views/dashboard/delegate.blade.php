@extends('layouts.app')

@section('title', 'Delegate')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-1">
            @include('layouts.sidebar')
        </div>

        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Delegate</div>

                <div class="card-body">

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection