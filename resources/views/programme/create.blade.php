
      <form method="post" action="{{url('programme')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <p>title</p>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="row">
                <p>description</p>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="row">
                <p>venue</p>
            <input type="text" class="form-control" name="venue">
        </div>
        <div class="row">
            <p>speaker</p>

            <select class="form-control" name="speaker_id">
                @foreach( $users as $user )
                    <option value="{{ $user->uid }}" >{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <p>moderator</p>
            <select class="form-control" name="moderator_id">
                @foreach( $users as $user )
                    <option value="{{ $user->uid }}" >{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
                <p>start_time</p>
            <input type="text" class="form-control" name="start_time">
        </div>
        <div class="row">
                <p>end_time</p>
            <input type="text" class="form-control" name="end_time">
        </div>
        <div class="row">
                <p>date</p>
            <input type="text" class="form-control" name="date">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
