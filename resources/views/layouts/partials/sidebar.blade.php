
<!-- Side Navigation Menu -->
<div class="navbar-default sidebar pb-5 pt-4" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <div class="card text-center mr-5">
            <div class="card-img">
                <img class="img-fluid rounded-3 w-50" src="{{ asset('images/') }}/{{Auth::user()->photo}}" alt="pic">
            </div>
            <div class="card-body">
                <div class="card-title text-capitalize">
                    <h4>
                        {{Auth::user()->name}}
                    </h4>
                </div>
                <div class="card-text text-capitalize">
                    {{Auth::user()->role}}
                </div>
            </div>
        </div>

        <div class="row buttons pl-2 pr-5">

        @if(Auth::user()->role == 'admin')

            <div class="col-12">
                <a href="{{url('/dashboard/admin')}}" type="button" class="button btn btn-shadow btn-block active text-left "><i class="fas fa-tasks pr-2"></i>Dashboard</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/users')}}" type="button" class="btn btn-block btn-shadow text-left"><i class="fas fa-tasks pr-2"></i>Users</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/permissions')}}" type="button" class="btn btn-block btn-shadow text-left"><i class="fas fa-tasks pr-2"></i>Permissions</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/admin/session')}}" type="button" class="btn btn-block btn-shadow text-left"><i class="fas fa-tasks pr-2"></i>Manage Sessions</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/speakers')}}" type="button" class="btn btn-block  btn-shadow text-left"><i class="fas fa-users-cog pr-2"></i>Speakers</a>
            </div>

        @elseif(Auth::user()->role == 'delegate')

            <div class="col-12">
                <a href="{{url('/dashboard/delegate')}}" type="button" class="button btn btn-shadow btn-block active text-left "><i class="fas fa-tasks pr-2"></i>Dashboard</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/speakers')}}" type="button" class="btn btn-block  btn-shadow text-left"><i class="fas fa-users-cog pr-2"></i>Speakers</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/exhibitors')}}" type="button" class="btn btn-block  btn-shadow text-left"><i class="fas fa-users-cog pr-2"></i>Exhibitors</a>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-block  btn-shadow text-left"><i class="fas fa-users-cog pr-2"></i>Social Events</button>
            </div>

        @elseif(Auth::user()->role == 'manager')

            <ul class="list-unstyled">
                <li>
                    <a href="{{url('/dashboard/manager/')}}">Dashboard</a>
                </li>
                <li>
                    <a href="{{url('/dashboard/delegates/example')}}">manager Example </a>
                </li>
            </ul>

        @elseif(Auth::user()->role == 'exibitor')

            <ul class="list-unstyled">
                <li>
                    <a href="{{url('/dashboard/exibitor/')}}">Dashboard</a>
                </li>
                <li>
                    <a href="{{url('/dashboard/delegates/example')}}">exibitor Example </a>
                </li>
            </ul>

        @elseif(Auth::user()->role == 'speaker')

            <ul class="list-unstyled">
                <li>
                    <a href="{{url('/dashboard/speaker/')}}">Dashboard</a>
                </li>
                <li>
                    <a href="{{url('/dashboard/delegates/example')}}">speaker Example</a>
                </li>
            </ul>

        @elseif(Auth::user()->role == 'author')

            <ul class="list-unstyled">
                <li>
                    <a href="{{url('/dashboard/author/')}}">Dashboard</a>
                </li>
                <li>
                    <a href="{{url('/dashboard/delegates/example')}}">author Example</a>
                </li>
            </ul>

        @endif
        </div>

        <div class="row buttons text-left ml-4 mb-5 mt-5 pt-4">
            <div class="col-12 pb-3"><h6>More</h6></div>
            <div class="col-12 pb-3"><a href="#">General Event Infomation</a></div>
            <div class="col-12 pb-3"><a href="#">Exhibition Floor Plan</a></div>
            <div class="col-12 pb-3"><a href="#">Social Events</a></div>
            <div class="col-12 pb-3"><a href="#">Host Airline</a></div>
            <div class="col-12 pb-3"><a href="#">Media Entities</a></div>
            <div class="col-12 pb-3	"><a href="#">Organisers</a></div>
        </div>

        <div class="logoutswitch ml-4 pl-1">
            <input type="hidden" id="logout_url" name="logout_url" value="{{ route('logout') }}">
            <label class="switch">
              <input type="checkbox" id="switch_to_logout">
              <span class="slider round text"></span>
            </label>
            <span>Sign Out</span>
        </div>

    </div>
</div>
