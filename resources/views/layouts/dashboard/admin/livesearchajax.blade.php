<table id="txtHint" class="table table-striped title-color">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Permission</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($usersSearch as $index => $user)
            <tr>
                <td>{{$index +1}}</td>
                <td>{{ $user->name }}</td>
                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                <td>{{ $user->role }}</td>
                <td>
                    <div class="truncate-ellipsis">
                        
                    </div>
                </td>
                <td>
                    @if($user->verified === 1)
                        Verified
                    @else
                        Not Verified
                    @endif
                </td>
                <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                        <label class="btn btn-success btn-sm active">
                            <a href="" title="Edit" style="color:#fff; text-decoration:none;">Edit
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </label>
                        <label class="btn btn-primary btn-sm">
                            <a href="" title="Lock /Unlock" style="color:#fff;  text-decoration:none;">Lock
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </label>
                        <label class="btn btn-danger btn-sm">
                            <a href="" title="Delete" style="color:#fff; text-decoration:none;">Delete
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </a>
                        </label>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>

    <tr>
        <td colspan="5" >
            Showing from {!! $usersSearch->firstItem() !!} to {!! $usersSearch->lastItem() !!} of {!! $usersSearch->total() !!} entries
        </td>
        <td colspan="2" class="text-right">{!! $usersSearch->links() !!}</td>
    </tr>
</table>