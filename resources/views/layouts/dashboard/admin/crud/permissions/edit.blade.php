@extends('layouts.app')

@section('title', 'Dashboard - Edit Permission(s)')

@section('content')

<div class="container-fluid myDiv">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard - Edit Permission(s)</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{action('Admin\Dashboard\ManagePermissionsController@update', $pid)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$permissions->role}}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="Permissions">Permissions:</label>
                                    <input type="text" class="form-control" name="permissions">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4" style="margin-top:60px">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
