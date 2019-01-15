@extends('layouts.app')

@section('title', 'Payment')

@section('content')

<div class="row">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

<div id="adminTable">
    <div class="table_header ">
        <div class="row ">
            <div class="col-md-2">
                <div class="mx-auto mt-2 intro1">
                    <h6 class="text-capitalize">Payment</h6>
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

        <form enctype='multipart/form-data' class="" method="post" action="{{url('dashboard/delegate/payment')}}">
            @csrf

            <div class="row">

                <div class="col-md-12 form-group">
                    <label for="account_number" class="col-form-label text-md-right">{{ __('Account Number:') }}</label>
                    <input type="number" class="form-control" name="account_number" placeholder="" value="" required>
                    <small class="error">{{$errors->first('account_number')}}</small>
                </div>

                <div class="col-md-6 form-group ">
                    <label for="expiration_month" class="col-form-label text-md-right">{{ __('Expiration Month:') }}</label>
                    <input type="number" class="form-control" name="expiration_month" placeholder="12" value="" required>
                </div>
                <div class="col-md-6 form-group ">
                    <label for="expiration_year" class="col-form-label text-md-right">{{ __('Expiration Year:') }}</label>
                    <input type="number" class="form-control" name="expiration_year" placeholder="2019" value="" required>
                </div>

                <div class="col-md-12 text-left" style="margin-top:30px">
                    <h4 style="text-decoration:underline"><b>Disclaimer!</b></h4>
                    <p><b> We do not store any card information for security reasons.</b></p>
                </div>

                <div class="col-md-6 form-group align-self-end mt-5">
                    <button type="submit" class="btn btn-afraa-full-2 mb-2">
                        {{ __('Pay Now') }}
                    </button>
                </div>

            </div>
        </form>

    </div>

</div>

@endsection
