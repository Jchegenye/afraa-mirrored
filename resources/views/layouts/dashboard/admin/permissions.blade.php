@extends('layouts.app')

@section('title', 'Dashboard - Manage Permissions')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-1">
            @include('layouts.sidebar')
        </div>

        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                        <div class="col-md-4 ">
                            <div class="mx-auto mt-2">
                                Dashboard - Manage Permissions
                            </div>
                        </div>

                        <div class="col-md-8 ">
                            <div class="row">
                                <div class="col-md-6 offset-md-2 search">
                                    <input type="text" class="form-control" autocomplete="off" id="search" placeholder="Seach permissions here ..." aria-label="Seach user here ..." aria-describedby="basic-addon2">
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('dashboard/permissions/create')}}" class="btn btn-primary">Create Permissions</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive-sm">
                                <table id="txtHint" class="table table-striped title-color ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Permissions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($permissions as $index => $permission)

                                            <tr>
                                                <td>{{$index +1}}</td>
                                                <td>{{ $permission->role }}</td>
                                                <td>
                                                    <div class="truncate-ellipsis">
                                                    
                                                        @foreach ($permission->permissions as $perm)
                                                            <span class="badge badge-light">
                                                                {{ $perm }}
                                                            </span>
                                                        @endforeach
                                                        
                                                    </div>
                                                </td>
                                            
                                                <td>
                                                    <div class="btn-group btn-group-toggle" >

                                                        <label class="btn btn-success btn-sm active">
                                                            <a href="{{action('Admin\Dashboard\ManagePermissionsController@edit', $permission['pid'])}}" title="Edit" style="color:#fff; text-decoration:none;">Edit
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            </a>
                                                        </label>
                                                        
                                                        <label class="btn btn-danger btn-sm">
                                                            <a href="{{action('Admin\Dashboard\ManagePermissionsController@destroy', $permission['pid'])}}" title="Trash" style="color:#fff; text-decoration:none;">Trash
                                                            </a>
                                                        </label>

                                                    </div>
                                                </td>
                                            
                                            </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
@endsection