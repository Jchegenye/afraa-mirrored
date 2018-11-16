<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  @include('layouts.partials.styles')

  <title>
    @yield('title')
  </title>

</head>

<body>

<section class="container">
  <div class="row loginpage">
    <div class="col-md-6 loginleft text-center p-5 text-white m-0 shadow-sm">
      <div class="content">
        <h1><strong>WELCOME TO AGA5O</strong></h1>
        <p class="p-3 pb-5 pl-5 pr-5">The AGA and Summit is a high profile air transport event dedicated to airline CEOs and top executives in the aviation industry.</p>

        @if(View::hasSection('register'))
            <span>Already have an account? <a href="{{ route('login') }}">Login</a></span>
        @else
            <span>Not yet registered? <a href="{{ route('register') }}">Signup</a></span>
        @endif
      </div>
    </div>
    <div class="col-md-6 loginright pt-4 shadow">
        <div class="row text-center">
            <div class="col-md-12">
              <img class="img-fluid logo" src="images/logo.png" alt="logo">
            </div>

          @yield('content')

        </div>
    </div>
  </div>
</section>

@include('layouts.partials.scripts')

</body>
</html>
