@section('sidebar')

    @if(Auth::user()->role == 'admin')

        <ul class="list-unstyled">
            <li>
                <a href="{{url('/dashboard/admin')}}">Dashboard</a> 
            </li>
            <li>
                <a href="{{url('/dashboard/users')}}">Users</a> 
            </li>
            <li>
                <a href="{{url('/dashboard/roles')}}">Roles</a>
            </li>
            <li>
                <a href="{{url('/dashboard/permissions')}}">Permissions</a>
            </li>
        </ul>

    @elseif(Auth::user()->role == 'delegate')

        <ul class="list-unstyled">
            <li>
                <a href="{{url('/dashboard/delegate/')}}">Dashboard</a> 
            </li>
            <li>
                <a href="{{url('/dashboard/delegates/programe')}}">Programmes</a> 
            </li>
        </ul>

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

@show