@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">
        
        <div id="statistics" class="text-center">
            
            @php $roles = ''; @endphp
                @foreach ($users as $user)

                    @php $roles .= $user->role; @endphp
                    {{-- {{
                        $user->role
                    }} --}}

                @endforeach
            @php $role = $roles; @endphp
            
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>14</h1>
                                <h6>Manager</h6>

                                <a href="#" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>350</h1>
                                <h6>DELEGATES</h6>

                                <a href="#" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>150</h1>
                                <h6>SPONSORS</h6>

                                <a href="#" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>50</h1>
                                <h6>SPEAKERS</h6>

                                <a href="#" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-card-cover">
                                <h1>25</h1>
                                <h6>EXHIBITORS</h6>

                                <a href="#" class="btn btn-afraa-full-2">View all</a>
                            </div>
                        </div>
                    </div>

                </div>

        </div>

    </div>

@endsection
