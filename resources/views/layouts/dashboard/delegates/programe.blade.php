@extends('layouts.app')

@section('title', 'Delegate - Programme List')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-1">
            @include('layouts.sidebar')
        </div>

        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Delegate - Programme List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                
            </div>
        </div>
        
    </div>
</div>
@endsection