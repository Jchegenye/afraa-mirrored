@extends('welcome')

@section('title', 'Register')

@section('register', 'Register')

@section('content')

<div class="row pt-5 pb-2 pl-5 pr-5 ">
    <div class="col-md-12 text-left">
        <h4>Hi there!</h4>
        <p class="pr-2">Sign in to be part of be part of the conference. We are glad to host you.</p>
    </div>
    <div>
        @if (session('information'))
            <div class="alert alert-info">
                {{ session('information') }}
            </div>
        @endif
        @if (session('successful'))
            <div class="alert alert-success">
                {{ session('successful') }}
            </div>
        @endif
        @if (session('unsuccessful'))
            <div class="alert alert-danger">
                {{ session('unsuccessful') }}
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-title pt-3 ml-3"><p class="pl-4">REGISTER</p></div>
        <div class="form-group ml-3 shadow-xm">

            <input id="name" type="text"  placeholder="Full Name" class="form-control-lg rounded-0 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group ml-3 shadow-xm">

            <input id="email" type="email" placeholder="Email" class="form-control-lg rounded-0 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group ml-3 shadow-xm">
            <input id="password" type="password" placeholder="Password"  class="form-control-lg rounded-0 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group ml-3 shadow-xm">
            <input id="password-confirm" type="password" placeholder="Confirm Password"  class="form-control-lg rounded-0 form-control" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        @if (app()->environment('production'))
            <div class="form-group ml-3">
                <div class="g-recaptcha" data-sitekey="
                {{ env('GOOGLE_RECAPTCHA_KEY') }}
                " ></div>
                @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display: block;">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
            </div>
        @endif

        <div class="form-group ml-3 shadow-xm">

        </div>
        <div class="form-group ml-3">
            <p>Already have an account? <a href="{{ route('login') }}">Login Here</a> </p>
        </div>
        <div class="form-group ml-3 text-right">
            <button type="submit" class="bg-transparent border-0 cursor-pointer">
                <span class="text-black pr-4">{{ __('Submit') }}</span><i class="fas fa-sign-in-alt"></i>
            </button>
        </div>
    </form>
</div>

@endsection

