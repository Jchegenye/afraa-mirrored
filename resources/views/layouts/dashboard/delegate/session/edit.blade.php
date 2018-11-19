
        <form method="post" action="{{action('ProgrammeSession\ProgrammeSessionController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <label for="name">Title:</label>
            <input type="text" class="form-control" name="title" value="{{$session->title}}">
        </div>
        <div class="row">
              <label for="email">Description</label>
              <input type="text" class="form-control" name="description" value="{{$session->description}}">
        </div>
        <div class="row">
              <label for="number">venue:</label>
              <input type="text" class="form-control" name="venue" value="{{$session->venue}}">
        </div>
        <div class="row">
            <label for="number">speaker:</label>
            <select class="form-control" name="speaker_id">
                @foreach( $users as $user )
                    <option value="{{ $user->uid }}"
                        @if ($user->uid === $session->speaker_id)
                            selected="selected"
                        @endif
                    >{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <label for="number">moderator:</label>
            <select class="form-control" name="moderator_id">
                @foreach( $users as $user )
                    <option value="{{ $user->uid }}"
                        @if ($user->uid === $session->moderator_id)
                            selected="selected"
                        @endif
                    >{{ $user->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="row">
            <label for="number">start_time:</label>
            <input type="text" class="form-control" name="start_time" value="{{$session->start_time}}">
        </div>
        <div class="row">
            <label for="number">end_time:</label>
            <input type="text" class="form-control" name="end_time" value="{{$session->end_time}}">
        </div>
        <div class="row">
            <label for="number">date:</label>
            <input type="text" class="form-control" name="date" value="{{$session->date}}">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
        </div>
      </form>
