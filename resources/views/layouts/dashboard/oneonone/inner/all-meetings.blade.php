<div class="row">
    <div class="col-md-12 heading">
        <h3 class="page-header"> @yield('title')</h3>
        <p>All meetings</p>
    </div>
</div>

<div class="row" id="dashtabs">
    <nav class="col-md-9">
        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">
                <b class="text-default">{{$oneononemymeetingcount}}</b> Meetings Scheduled
            </a>
            <a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">
                <b class="text-default ">{{$oneononetotalmeetingcount}}</b> Meeting's requested
            </a>
        </div>
    </nav>
    <div class="col-md-3">
        <a href="{{ route('tables.index') }}" class="btn btn-afraa-full-2 float-right">Tables & Timeslots</a>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-8"></div>
    <div class="col-md-4 clearfix meeting-search float-right">
        <form class="">
            <div class="form-group">
                <label class="sr-only" for="search">Search</label>
                <div class="input-group">
                    <input class="form-control search" id="search" placeholder="Search">
                </div>
            </div>
        </form>
    </div>
</div>
    
<div class="row">
    <div class="tab-content col-md-12" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">

            <section id="allmeetings">
                <div class="row">
                    <section class="col col-lg-12 meetingsinfo clearfix">
                        <table class="table table-hover table-striped" id="all-meetings">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Company</th>
                                    <th>Add to Calendar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($oneononetables as $tables)
            
                                    <tr>
                                        
                                        @foreach ($oneononetimeslots as $slots)
                                            @if ($tables->timeslot_id == $slots->timeslot_id)
                                                <td><b>{{$slots->time}}</b></td>
                                            @endif
                                        @endforeach
            
                                        <td><b>{{$tables->name}}</b></td>
                                        <td><b>{{$tables->position}}</b></td>
                                        <td><b>{{$tables->company}}</b></td>
                                        <td></td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>

            {{-- {!! $tables->links() !!} --}}

        </div>
        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">

                <section id="allmeetings">
                    <div class="row">
                        <section class="col col-lg-12 meetingsinfo clearfix">
                            <table class="table table-hover table-striped" id="all-meetings">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Company</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($oneononeallmeetings as $tables)
                
                                        <tr>
                                            <td><b>{{$tables->name}}</b></td>
                                            <td><b>{{$tables->position}}</b></td>
                                            <td><b>{{$tables->company}}</b></td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                    </div>
                </section>

            {{-- {!! $tables->links() !!} --}}

        </div>
        
    </div>
</div>