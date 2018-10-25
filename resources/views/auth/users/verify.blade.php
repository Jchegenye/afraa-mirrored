@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
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
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
