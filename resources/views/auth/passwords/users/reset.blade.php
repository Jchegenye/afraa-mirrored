@extends('welcome')

@section('title', 'Request Password Reset')

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

                

                    <form method="POST" action="{{url('/passw/update/' .$token)}}">
                        @csrf
                        <div class="form-title pt-3 ml-3"><p>{{ __('Reset Password') }}</p></div>
                       
                        <div class="form-group ml-3 shadow-xm">
                                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="w-100 rounded-0 form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group ml-3 shadow-xm">
                                <input id="password" type="password" placeholder="{{ __('Password') }}" class="w-100 rounded-0 form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group ml-3  shadow-xm">
                                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="w-100 rounded-0 form-control-lg" name="password_confirmation">
                        
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-afraa-full-2">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
