<div id="popover-content-afraa" class="">{{-- d-none --}}
    <form class="form-horizontal" id="afraa" method="POST" action="{{route('oneonone.store')}}">
        @csrf

        <input type="hidden" name="tableId" value="{{$table->id}}">
        <input type="hidden" name="tableTitle" value="{{$table->company}}">
        <input type="hidden" name="tableSlug" value="{{$table->slug}}">

        @foreach ($timeslots as $slots)

            {{-- @if ($slots->id == )
                {{$slots->id}}
            @endif --}}
            {{-- <label class="text-line-through">
                <input type="radio" class="btn-disable" disabled> 
                <b class="text-uppercase">{{camel_case($slots->tslot)}}</b>: {{$slots->time}}
            </label> --}}
            <input type="hidden" name="slotId" value="{{$slots->id}}">
            <label>
                <input type="radio" name="timeSlot" id="timeSlot" value="{{$slots->time}}"> 
                <b class="text-uppercase">{{camel_case($slots->tslot)}}</b>: {{$slots->time}}
            </label>
        @endforeach

        <hr class="mt-1">
        <button type="submit" class="btn btn-warning color-white">Confirm</button>
        
    </form>
</div>