
<!-- Side Navigation Menu -->
<div class="navbar-default sidebar pb-5 pt-4" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <div class="card text-center mr-5">
            <div class="card-img">

                @php
                $photo_url;
                if (Auth::user()->photo){
                    $photo_url = Auth::user()->photo;
                }else{
                    $photo_url = "avater.png";
                }
                @endphp
                <img class="img-fluid rounded-3 w-50" src="{{URL::asset('/images/'. $photo_url)}}" alt="pic">

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

            @php
                $uri = request()->route()->uri;
            @endphp

        @if(Auth::user()->role == 'admin')

            <div class="col-12">
                <a href="{{url('/dashboard/admin')}}" class="btn btn-block
                   @if ($uri == "dashboard/admin")
                       active
                   @endif
                text-left "><i class="fas fa-user-cog pr-2"></i>Dashboard</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/admin/managers')}}" class="btn btn-block
                @if ($uri == "dashboard/admin/managers")
                    active
                @endif
              btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Manage Managers</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/admin/delegates')}}" class="button btn btn-shadow btn-block
                @if ($uri == "dashboard/admin/delegates")
                    active
                @endif
               text-left "><i class="fas fa-user-cog pr-2"></i>Manage Delegates</a>
            </div>{{-- {{url('/dashboard/delegate')}} --}}
            <div class="col-12">
                <a href="{{url('/dashboard/admin/session')}}" class="btn btn-block
                @if ($uri == "dashboard/admin/session")
                    active
                @endif
               btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Manage Programme</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/speakers')}}" class="btn btn-block
                @if ($uri == "dashboard/delegate/speakers")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Manage Speakers</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/admin/documents')}}" class="btn btn-block
                @if ($uri == "dashboard/admin/documents")
                    active
                @endif
               btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Manage Downloads</a>
            </div>

            <div class="col-12">
                <a href="{{url('/dashboard/delegate/exhibitors')}}" class="btn btn-block
                @if ($uri == "dashboard/delegate/exhibitors")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Manage Exhibitors</a>
            </div>{{-- {{url('/dashboard/delegate/exhibitors')}} --}}
            <div class="col-12">
                <a href="{{url('/dashboard/sponsors')}}" class="btn btn-block
                @if ($uri == "dashboard/sponsors")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Manage Sponsors</a>
            </div>{{-- {{url('/dashboard/delegate/exhibitors')}} --}}

            <div class="col-12">
                <a href="{{url('/dashboard/delegate/questions-and-answers')}}" class="btn btn-block
                @if ($uri == "dashboard/delegate/questions-and-answers")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Manage Q&A</a>
            </div>

        @elseif(Auth::user()->role == 'delegate')

            <div class="col-12">
                <a href="{{url('/dashboard/delegate')}}" class="button btn btn-shadow
                @if ($uri == "dashboard/delegate")
                    active
                @endif
               btn-block text-left "><i class="fas fa-user-cog pr-2"></i>Dashboard</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/session')}}" class="button btn btn-shadow
                @if ($uri == "dashboard/delegate/session")
                    active
                @endif
               btn-block text-left "><i class="fas fa-user-cog pr-2"></i>Programme</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/all')}}" class="btn btn-block
                @if ($uri == "dashboard/delegate/all")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Delegates</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/speakers')}}" class="btn btn-block
                @if ($uri == "dashboard/delegate/speakers")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Speakers</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/exhibitors')}}" class="btn btn-block
                @if ($uri == "dashboard/delegate/exhibitors")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Exhibitors</a>
            </div>
            <div class="col-12">
                <a href="{{url('/dashboard/delegate/documents')}}" class="btn btn-block
                @if ($uri == "dashboard/delegate/documents")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Downloads</a>
            </div>

            {{-- <div class="col-12">
                -- <a href="{{url('/dashboard/delegate/social-events')}}" class="btn btn-block --
                <a href="#" class="btn btn-block
                @if ($uri == "dashboard/delegate/social-event")
                    active
                @endif
                btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Social Events</a>
            </div> --}}

            @isset($isSpeaker)
                @if ($isSpeaker)

                    <div class="col-12">
                        <a href="{{url('/dashboard/delegate/questions-and-answers')}}" class="btn btn-block
                        @if ($uri == "dashboard/delegate/questions-and-answers")
                            active
                        @endif
                        btn-shadow text-left"><i class="fas fa-user-cog pr-2"></i>Q&A</a>
                    </div>

                @endif
            @endisset



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

        @if(Auth::user()->role == 'admin')

            <div class="row buttons text-left ml-3 mb-4 mt-4 pt-3">
                <div class="col-12"><a href="#">Edit AGA</a></div>
                <div class="col-12"><a href="#">Edit ASC</a></div>
            </div>

        @else

            <div class="row buttons text-left ml-3 mb-4 mt-4 pt-3">
                <div class="col-12 pb-3"><h6>More</h6></div>
                <div class="col-12 pb-3"><a href="#">General Event Infomation</a></div>
                <div class="col-12 pb-3"><a href="#">Exhibition Floor Plan</a></div>
                <div class="col-12 pb-3"><a href="#">Social Events</a></div>
                <div class="col-12 pb-3"><a href="#">Host Airline</a></div>
                <div class="col-12 pb-3"><a href="#">Media Entities</a></div>
                <div class="col-12 pb-3	"><a href="#">Organisers</a></div>
            </div>

        @endif

        {{-- <div class="logoutswitch ml-4 pl-1">
            <input type="hidden" id="logout_url" name="logout_url" value="{{ route('logout') }}">
            <label class="switch">
              <input type="checkbox" id="switch_to_logout">
              <span class="slider round text"></span>
            </label>
            <span>Sign Out</span>
        </div> --}}

    </div>
</div>
