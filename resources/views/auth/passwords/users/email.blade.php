@extends('welcome')

@section('title', 'Reset Password')

{{-- @section('head')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 pt-4 loginright">
            
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
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

        
                <form method="POST" action="{{ route('passw.email') }}">
                    @csrf
                    <div class="form-title pt-3 ml-3"><p>{{ __('Reset Password') }}</p></div>

                    <div class="form-group ml-3 shadow-xm">
                        <input id="email" type="email" placeholder="Email" class="w-100 rounded-0 form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                         {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="g-recaptcha" data-sitekey="
                                @if (env('APP_ENV')!='Production')
                                {{ env('GOOGLE_RECAPTCHA_KEY') }}
                                @endif
                                "></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn btn-afraa-full-2">
                            {{ __('Send Password Reset Link') }}
                        </button>
                        </div>
                    </div>
                </form>

        </div>
    </div>
</div>
@endsection
