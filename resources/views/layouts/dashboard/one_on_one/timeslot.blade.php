@extends('layouts.app')

@section('title', 'Time Slots')

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
                    <h6 class="text-capitalize">time Slots</h6>
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

        <form enctype='multipart/form-data' class="" method="post" action="{{action('OneOnOneController@insertTimeSlots')}}" >

            @csrf

            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="from" class="col-form-label text-md-right">{{ __('From:') }}</label>
                    <input type="text" class="form-control timeslot_from" name="from" placeholder="" value="" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="to" class="col-form-label text-md-right">{{ __('To:') }}</label>
                    <input type="text" class="form-control timeslot_to" name="to" placeholder="" value="" required>
                </div>

                <div class="col-md-12 form-group">
                    <label for="step" class="col-form-label text-md-right">{{ __('Step:') }}</label>
                    <input type="number" class="form-control" name="step" placeholder="" value="" required>
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
