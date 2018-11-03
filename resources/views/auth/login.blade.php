@extends('welcome')

@section('title', 'Login')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
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

            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('passw.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}




      <div class="row pt-5 pb-2 pl-5 pr-5 ">
        <div class="col-md-12 text-left">
          <h4>Hi there!</h4>
           <p class="pr-2">Sign in to be part of the AGA50 conference. We are glad to host you.</p>
        </div>
        <div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
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
        </div>
        <form method="POST"  action="{{ route('login') }}" >
            @csrf
            <div class="form-title pt-3 ml-3"><p class="pl-4">LOGIN</p></div>
            <div class="form-group ml-3 shadow-xm">
                <input id="email" type="email" placeholder="Email" class="form-control-lg rounded-0 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group ml-3 shadow-xm">
                {{-- <input type="password" class="form-control-lg  rounded-0" id="inputEmail4" placeholder="Password"> --}}
                <input id="password" type="password"  placeholder="Password" class="form-control-lg  rounded-0 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="forgot text-right">
                <a class="btn btn-link" href="{{ route('passw.request') }}">
                    {{ __('Forgot?') }}
                </a>
            </div>
            <div class="form-group ml-3">
                <p>Don’t have an account? <a href="{{ route('register') }}">Register Here</a> </p>
            </div>
            <div class="form-group ml-3 text-right">
                <button type="submit" class="bg-transparent border-0 cursor-pointer">
                    <span class="text-black pr-4">{{ __('Login') }}</span><i class="fas fa-sign-in-alt"></i>
                </button>
            </div>
        </form>
      </div>
      @endsection
