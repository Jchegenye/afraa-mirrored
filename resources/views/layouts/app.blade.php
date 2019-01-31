<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('layouts.partials.styles')

  <title>African Airline Association</title>

</head>

<body class="container">

    @include('layouts.partials.navbar')

    @include('layouts.partials.sidebar')

	<!-- Dashboard Body Content Area -->
    <div id="page-wrapper" class="contents">

        @include('myflashalert::message')

        @if (session('status'))
            <div class="alert alert-primary">
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
            
        @yield('content')

    </div>

    @include('layouts.partials.scripts')

</body>
</html>
