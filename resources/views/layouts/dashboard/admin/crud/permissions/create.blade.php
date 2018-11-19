@extends('layouts.app')

@section('title', 'Dashboard - Create Permission(s)')

@section('content')

<div class="container-fluid myDiv">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard - Create Permission(s)</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="/">
                        @csrf

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                <label for="Name">Role:</label>
                                <select class="form-control" id="permissions" name="permissions">
                                    <option value="admin" selected>Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="delegate">Delegate</option>
                                    <option value="exibitor">Exibitor</option>
                                    <option value="author">Author</option>
                                    <option value="speaker">Speaker</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <label for="permissions">Permissions</label>
                                    <textarea class="form-control" id="permissions[]" name="permissions[]" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
