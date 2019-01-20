@extends('layouts.app')

@section('title', 'Success Payment')

@section('content')

<div id="adminTable">
    <div class="table_header ">
        <div class="row ">
            <div class="col-md-2">
                <div class="mx-auto mt-2 intro1">
                    <h6 class="text-capitalize">Success</h6>
                </div>
            </div>

            <div class="col-md-8"></div>

            <div class="col-md-2 pull-right">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{url()->previous()}}" class="btn btn-afraa tb-sm-text">
                            <i class="fas fa-arrow-left pr-2"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table_body p-5">
        <div class="card border-none mb-5 p-4 rounded">
            <div class="card-img-top text-center">
                <div class="alert alert-success pt-4"><h3  class="card-text  mb-0">Payment Successful!!</h3></div>
            </div>
                <div class="card-body text-center pb-0">
                    <p class="p-2 border-top card-footer pt-4">Thank you for paying for the 8<sup>th</sup> ASC </p>
                </div>
        </div>
    </div>

</div>

@endsection
