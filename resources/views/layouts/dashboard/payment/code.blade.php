@extends('layouts.app')

@section('title', 'Payment Code')

@section('content')

<div class="row">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

@if (session('payment_error'))
    <div class="alert alert-danger">

        <ul>
            <li>Business_Address*</li>
            <li>Country*</li>
        </ul>

        <a href="{{action('Users\UsersController@edit', Auth::id())}}" class="btn btn-afraa-full-2 tb-sm-text">
            Click here to update
        </a>

    </div>
@endif

<div id="adminTable">
    <div class="table_header ">
        <div class="row ">
            <div class="col-md-2">
                <div class="mx-auto mt-2 intro1">
                    <h6 class="text-capitalize">Payment Code</h6>
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

    <div class="table_body">

        <form enctype='multipart/form-data' class="" method="post" action="{{action('PaymentController@payment_index')}}" >

            @csrf

            <div class="row">

                <div class="col-md-12 form-group">
                    <label for="payment_code" class="col-form-label text-md-right">{{ __('Payment Code:') }}</label>
                    <input type="text" class="form-control" name="payment_code" placeholder="" value="">
                </div>

                <div class="col-md-12 ml-3 mt-4 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="no_payment_code" name="no_payment_code" value="no_payment_code" />
                    <label class="custom-control-label" for="no_payment_code">I dont have a payment code</label>
                </div>

                <div class="col-md-6 form-group align-self-end mt-5">
                    <button type="submit" class="btn btn-afraa-full-2 mb-2">
                        {{ __('Submit') }}
                    </button>
                </div>

            </div>
        </form>

    </div>

</div>

@endsection
