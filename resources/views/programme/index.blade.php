
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif


      @foreach($programme as $programmes)

        {{$programmes['id']}}
        {{$programmes['title']}}
        {{$programmes['description']}}
        {{$programmes['venue']}}
        {{$programmes['speaker_id']}}
        {{$programmes['moderator_id']}}
        {{$programmes['start_time']}}
        {{$programmes['end_time']}}
        {{$programmes['date']}}


        <a href="{{action('Programme\ProgrammeController@edit', $programmes['id'])}}" class="btn btn-warning">Edit</a>
        <form action="{{action('Programme\ProgrammeController@destroy', $programmes['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>

      @endforeach
