@extends('layouts.app')

@section('title', 'Delegates')

@section('content')
@php
    //dd($users);
@endphp

<div class="container-fluid">

    <div id="adminTable">

        <div class="table_header ggg"><!-- table header -->
            <div class="row ">
                <div class="col-md-4">
                    <div class="mx-auto mt-2 intro1">
                        <h6 class="text-capitalize">Delegates</h6>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>

        <div class="table_body ">
            <div class="row"><!-- table body -->
                <div class="col-md-12">

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
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td><div class="bg">{{$index +1}}</div></td>
                                        <td><div class="bg">{{ $user->name }}</div></td>
                                        <td><div class="bg">{{ $user->Job_Title }}</div></td>
                                        <td><div class="bg">{{ $user->Company_Name }}</div></td>
                                        <td>
                                            <div class="btn-group btn-group-toggle" >
                                                <a href="">
                                                    View
                                                </a>
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

@endsection
