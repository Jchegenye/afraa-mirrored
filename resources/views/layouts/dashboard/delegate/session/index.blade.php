
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif


      @foreach($session as $sessions)

        {{$sessions['id']}}
        {{$sessions['title']}}
        {{$sessions['description']}}
        {{$sessions['venue']}}
        {{$sessions['speaker_id']}}
        {{$sessions['moderator_id']}}
        {{$sessions['start_time']}}
        {{$sessions['end_time']}}
        {{$sessions['date']}}


        <a href="{{action('ProgrammeSession\ProgrammeSessionController@edit', $sessions['id'])}}" class="btn btn-warning">Edit</a>
        <form action="{{action('ProgrammeSession\ProgrammeSessionController@destroy', $sessions['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>

      @endforeach
