@extends('layouts.app')

@section('title', 'Dashboard - Manage Users')

@section('dashboard')

@section('users')
    <div class="card">
        <div class="card-header">
        
            <div class="row">

                <div class="col-md-4 ">
                    <div class="mx-auto mt-2">
                        Dashboard - Manage Users
                    </div>
                </div>

                <div class="col-md-8 ">
                    <div class="row ">
                        <div class="col-md-8 offset-md-2 search">
                            <input type="text" class="form-control" autocomplete="off" id="search" placeholder="Seach user here ..." aria-label="Seach user here ..." aria-describedby="basic-addon2">
                        </div>
                        <div class="col-md-2">
                            <a href="" class="btn btn-primary">Add User</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="container">

                <div id="txtHint" class="title-color">
                    @include('layouts.dashboard.admin.livesearchajax')
                </div>
                
            </div>

        </div>
        
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#search").keyup(function(){

                var str=  $("#search").val();
                if(str == "") {
                    $.get( "{{ asset(url('users/livesearch')) }}"); 
                }else {
                    $.get( "{{ asset(url('users/livesearch?uid=')) }}"+str, function( data ) {
                        $( "#txtHint" ).html( data ); 
                    });
                }
            });
        }); 
    </script>
@show

@endsection