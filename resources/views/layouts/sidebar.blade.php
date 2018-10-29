@section('sidebar')
                
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

@show