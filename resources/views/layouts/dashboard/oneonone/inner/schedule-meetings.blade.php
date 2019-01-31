<div class="row">
    <div class="col-md-12 heading">
        <h3 class="page-header"> @yield('title')</h3>
        <p>Who would you like to meet?</p>
        
        <a href="{{ route('oneonone.mymeetings') }}" class="btn btn-afraa-full-2 float-right">My meeting(s)</a>
    </div>
</div>

@if ($errors->has('timeSlot'))
    <small class="text-sm-left alert alert-danger" role="alert">
        <strong>{{ $errors->first('timeSlot') }}</strong>
    </small>
@endif

{{-- @php

    foreach ($oneononetables as $key => $oneonone) {
        //echo $oneononetables;
        if(!empty($oneonone->table_id)){
            
            foreach ($tables as $key => $value) { //get time slots here
                
                if($oneonone->table_id == $value->id){
                    echo $value->id; 
                }
                elseif($tables->first()->id == $oneonone->table_id ){
                    echo "s";
                }
                // elseif($oneononetables->first()->id == $value->id){
                //     echo "s";
                // }

            }

        }
        else{
            
            echo "nothing";
            
        }
    }

@endphp --}}

<div class="row oneonone mt-5">

    @foreach ($tables as $table)
        <div class="col-md-4">
            <div class="card-deck">
                <div class="card mb-4">
                    <img class="card-img-top img-fluid pr-2 pl-2 pt-2" src="{{ asset('images') . "/tables/" . $table->image_name }}" alt="{{$table->company}}">
                    <div class="card-body">
                        <h6 class="card-title"><b>{{$table->name}}</b></h6>
                        <p class="card-text">{{$table->position}}</p>

                        <a href="{{ url('#') }}/{{$table->id}}" class="
                            @foreach ($oneononetables as $value)
                                @if ($table->id == $value->table_id)
                                    btn-disable
                                @endif
                            @endforeach
                        btn btn-success btn-sm btn-ts-trigger-{{$table->id}}" role="button" data-original-title="" title="Select Time Slot Below">Schedule Meeting</a>
                        
                        <div id="popover-content-{{$table->id}}" class=" d-none
                            {{-- @foreach ($oneononetables as $value)
                                @if ($table->id == $value->table_id)
                                    d-none
                                @endif
                            @endforeach --}}

                            ">{{-- d-none --}}

                                <form class="form-horizontal" id="afraa" method="POST" action="{{route('oneonone.store')}}">
                                    @csrf
                            
                                    <input type="hidden" name="tableId" value="{{$table->id}}">
                                    <input type="hidden" name="tableTitle" value="{{$table->company}}">
                                    <input type="hidden" name="tableSlug" value="{{$table->slug}}">
                            
                                        @foreach ($timeslots as $slots)
                                        <label class="
                                            @foreach ($oneononealltimeslots as $value)
                                                @if ($slots->id == $value->timeslot_id)
                                                    text-line-through
                                                @endif
                                            @endforeach
                                            ">
                                    
                                    <input type="radio" name="timeSlot" id="timeSlot" value="{{$slots->time}}" 
                                        @foreach ($oneononealltimeslots as $value)
                                            @if ($slots->id == $value->timeslot_id)
                                                disabled
                                            @endif
                                        @endforeach
                                        >
                                            <b class="text-uppercase">{{camel_case($slots->tslot)}}</b>: {{$slots->time}}
                                        </label>

                                        @endforeach
                            
                                    <hr class="mt-1">
                                    <button type="submit" class="btn btn-warning color-white">Confirm</button>
                                    
                                </form>
                            </div>

                            {{-- <label class="text-line-through">
                                    <input type="radio" name="timeSlot" id="timeSlot" value="{{$slots->time}}" disabled> 
                                    <b class="text-uppercase">{{camel_case($slots->tslot)}}</b>: {{$slots->time}}
                                </label> 
                                
                                <input type="hidden" name="slotId" value="{{$slots->id}}">
                                                    <label>
                                                        <input type="radio" name="timeSlot" id="timeSlot" value="{{$slots->time}}"> 
                                                        <b class="text-uppercase">{{camel_case($slots->tslot)}}</b>: {{$slots->time}}
                                                    </label>
                                                    --}}

                            {{-- @include('layouts.dashboard.oneonone.inner.sub-inner.schedular') --}}
                    </div>
                </div>
                
            </div>
        </div>
    @endforeach

</div>

{{-- {!! $tables->links() !!} --}}