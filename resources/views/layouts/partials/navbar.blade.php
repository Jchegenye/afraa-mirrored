<!-- Top Navigation bar -->
<nav class="navbar navbar-default navbar-static-top p-4" role="navigation">
    <div class="navbar-header pl-4">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid logo" src="{{ asset('images/logo.png') }}" alt="logo">
        </a>
    </div>
    <ul class="nav navbar-top-links navbar-right myaccount">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                My Account <span class="caret"></span>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li class="dropdown-item" ><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="dropdown-item" ><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-item" >
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  <i class="fa fa-sign-out fa-fw"></i>
                     {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</nav>
