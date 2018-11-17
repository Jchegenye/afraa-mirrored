<table id="txtHint" class="table title-color ">

    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Position</th>
            <th>Company</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($usersSearch as $index => $user)
            @if($user->deleted_at)
                <tr style="opacity: 0.6; background-color: #ffa5004d;">
                    <td><div class="bg">{{$index +1}}</div></td>
                    <td><div class="bg">{{ $user->name }}</div></td>
                    <td><div class="bg">{{ $user->Job_Title }}</div></td>
                    <td><div class="bg">{{ $user->Company_Name }}</div></td>
                    {{--  <td>
                        <div class="bg">
                            @if($user->verified === 1)
                                Verified
                            @else
                                Not Verified
                            @endif
                        </div>
                    </td>  --}}
                    <td>
                        <div class="btn-group btn-group-toggle pull-right" >
                            <label class="" >
                                Trashed - &nbsp;
                            </label>
                            <a href="{!! url('dashboard/users/trash/' . $user->uid) !!}" title="Recycle">
                                Recycle
                            </a>
                        </div>
                    </td>
                </tr>
            @else
                <tr>
                    <td><div class="bg">{{$index +1}}</div></td>
                    <td><div class="bg">{{ $user->name }}</div></td>
                    <td><div class="bg">{{ $user->Job_Title }}</div></td>
                    <td><div class="bg">{{ $user->Company_Name }}</div></td>
                    {{--  <td>
                        <div class="bg">
                            @if($user->verified === 1)
                                Verified
                            @else
                                Not Verified
                            @endif
                        </div>
                    </td>  --}}
                    <td class="mx-auto" style="display: inline;">
                        <div class="">
                            <a href="{!! url('dashboard/users/edit/' . $user->uid ) !!}/" title="Edit" class="text-darkred">
                                <i class="far fa-edit pr-3"></i>
                            </a>
                            <a href="{!! url('dashboard/users/trash/' . $user->uid) !!}" title="Trash">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endif
        @endforeach

        {{--  <tr class="mt-2">
            <div class="mx-auto" style="display: inline;">
                <td colspan="4" style="padding: 20px 0;">
                    Showing from {!! $usersSearch->firstItem() !!} to {!! $usersSearch->lastItem() !!} of {!! $usersSearch->total() !!} entries
                </td>
                <td  class="text-right">{!! $usersSearch->links() !!}</td>
            <div>
        </tr>  --}}

    </tbody>

</table>

{{-- <div class="table-responsive-sm">
    <table id="txtHint" class="table table-striped title-color ">
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

                @if($user->deleted_at)
                    <tr style="opacity: 0.6; background-color: #ffa5004d;">
                        <td>{{$index +1}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="truncate-ellipsis">

                                @foreach ($user->permissions as $permission)
                                    <span class="badge badge-light">
                                        {{ $permission }}
                                    </span>
                                @endforeach
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
                            <div class="btn-group btn-group-toggle" >
                                <label class="btn btn-default btn-sm active" >
                                    TRASHED -
                                </label>
                                <label class="btn btn-success btn-sm">
                                    <a href="{!! url('dashboard/users/trash/' . $user->uid) !!}" title="Recycle" style="color:#fff; text-decoration:none;">
                                        Recycle
                                    </a>
                                </label>
                            </div>
                        </td>
                    </tr>
                @else
                <tr>
                    <td>{{$index +1}}</td>
                    <td>{{ $user->name }}</td>
                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <div class="truncate-ellipsis">

                            @foreach ($user->permissions as $permission)
                                <span class="badge badge-light">
                                    {{ $permission }}
                                </span>
                            @endforeach
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
                        <div class="btn-group btn-group-toggle" >

                            <label class="btn btn-success btn-sm active">
                                <a href="{!! url('dashboard/users/edit/' . $user->uid ) !!}/" title="Edit" style="color:#fff; text-decoration:none;">Edit
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            </label>

                            <label class="btn btn-danger btn-sm">
                                <a href="{!! url('dashboard/users/trash/' . $user->uid) !!}" title="Trash" style="color:#fff; text-decoration:none;">Trash
                                </a>
                            </label>

                        </div>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>

        <tr>
            <td colspan="5" >
                Showing from {!! $usersSearch->firstItem() !!} to {!! $usersSearch->lastItem() !!} of {!! $usersSearch->total() !!} entries
            </td>
            <td colspan="2" class="text-right">{!! $usersSearch->links() !!}</td>
        </tr>
    </table>
</div> --}}
