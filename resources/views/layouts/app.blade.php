<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  @include('layouts.partials.styles')

  <title>African Airline Association</title>

</head>

<body class="container">

    @include('layouts.partials.navbar')

    @include('layouts.partials.sidebar')

	<!-- Body Content Area -->
    <div id="page-wrapper" class="contents">

        @yield('content')

    </div>

    @include('layouts.partials.scripts')

</body>
</html>
