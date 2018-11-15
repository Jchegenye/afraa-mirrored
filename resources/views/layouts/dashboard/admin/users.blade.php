@extends('layouts.app')

@section('title', 'Dashboard - Manage Users')

@section('content')
<div class="container-fluid">

    <div id="adminTable">

        <div class="table_header ggg"><!-- table header -->
            <div class="row ">
                <div class="col-md-4">
                    <div class="mx-auto mt-2 intro1">
                        <h6>User(s)</h6>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-7 offset-md-2 ">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control bg-danger text-white rounded-left" autocomplete="off" id="search" placeholder="Seach...">
                                <span class="input-group-btn border-0">
                                    <button class="btn btn-default bg-danger text-white rounded-right" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="{{url('/dashboard/users/create/')}}" class="btn btn-afraa tb-sm-text">
                                <i class="fas fa-user-plus"></i> Add User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table_body ">
            <div class="row"><!-- table body -->
                <div class="col-md-12">
                    @include('layouts.dashboard.admin.livesearchajax')
                </div>
            </div>
        </div>

    </div>

</div>

    {{-- <!-- <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">

                    <div class="row">

                        <div class="col-md-4 ">
                            <div class="mx-auto mt-2">
                            Dashboard - Manage Users
                            </div>
                        </div>

                        <div class="col-md-8 ">
                            <div class="row">
                                <div class="col-md-8 offset-md-2 search">
                                    <input type="text" class="form-control" autocomplete="off" id="search" placeholder="Seach user here ..." aria-label="Seach user here ..." aria-describedby="basic-addon2">
                                </div>
                                <div class="col-md-2">
                                    <a href="{{url('/dashboard/users/create/')}}" class="btn btn-primary">Add User</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <div class="container">
                        <div id="txtHint" class="title-color">
                            @include('layouts.dashboard.admin.livesearchajax')
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div> --> --}}
</div>


<script type="text/javascript">
    
</script>
@endsection
