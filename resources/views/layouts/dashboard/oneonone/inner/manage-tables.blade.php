<div class="row">
    <div class="col-md-12 heading">
        <h3 class="page-header"> @yield('title')</h3>
        <p>Available tables & timeslots</p>
    </div>
</div>

<div class="row" id="dashtabs">{{-- d="dashtabs" --}}
    <nav class="col-md-6">
        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">
                Tables
            </a>
            <a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">
                Timeslots
            </a>
        </div>
    </nav>
    <div class="col-md-6">
        <a href="{{ route('oneonone.meetings') }}" class="btn btn-afraa-full-2  float-right">Meetings</a>
    </div>
</div>

<hr>

<div class="row">
    <div class="tab-content col-md-12" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
            
            <div class="row mt-2 mb-4">
                <a href="{{ route('tables.create') }}" class="btn btn-afraa-full-2 ml-3  float-right">Add Table</a>
            </div>
            <div class="row oneonone">
    
                @foreach ($tables as $table)
                    <div class="col-md-4">
                        <div class="card-deck">
                            <div class="card mb-4">
                                <img class="card-img-top img-fluid pr-2 pl-2 pt-2" src="{{ asset('images') . "/tables/" . $table->image_name }}" alt="{{$table->company}}">
                                <div class="card-body">
                                    <h6 class="card-title"><b>{{$table->name}}</b></h6>
                                    <p class="card-text">{{$table->position}}</p>

                                    <form action="{{ route('tables.destroy',$table->id) }}" method="POST" class="">
                                    
                                        <a class="btn btn-success btn-sm" href="{{ route('tables.edit',$table->id) }}">Edit</a>

                                        <a class="btn btn-primary btn-sm" href="{{ route('tables.show',$table->id) }}">View</a>
                    
                                        @csrf
                                        @method('DELETE')
                            
                                        <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            {!! $tables->links() !!}

        </div>
        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">

            <div class="row mt-2 mb-4">
                <a href="{{ route('timeslots.create') }}" class="btn btn-afraa-full-2 ml-3  float-right">Add Timeslots</a>
            </div>

            <section id="allmeetings">
                <div class="row">
                    <section class="col col-lg-12 meetingsinfo clearfix">
                        <table class="table table-hover table-striped" id="all-meetings">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Timeslot</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($timeslots as $slots)

                                    <tr>
                                        <td><b>{{$slots->date}}</b></td>
                                        <td>
                                            <b>{{$slots->time}}</b>
                                        </td>
                                        <td>
                                            <b>{{$slots->tslot}}</b>
                                        </td>
                                        {{-- <td>
                                            <form action="{{ route('timeslots.destroy',$slots->id) }}" method="POST" class="">
                        
                                                <a class="btn btn-success btn-sm" href="{{ route('timeslots.edit',$slots->id) }}">Edit</a>
            
                                                @csrf
                                                @method('DELETE')
                                    
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                
                                @endforeach
                                
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>

            {!! $timeslots->links() !!}
        </div>
        
    </div>
</div>