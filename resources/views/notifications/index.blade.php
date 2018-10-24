
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif


      @foreach($notifications as $notification)

        {{$notification['id']}}
        {{$notification['title']}}
        {{$notification['description']}}
        {{$notification['venue']}}
        {{$notification['speaker_id']}}
        {{$notification['moderator_id']}}
        {{$notification['start_time']}}
        {{$notification['end_time']}}
        {{$notification['date']}}


        <a href="{{action('Notifications\NotificationsController@edit', $notification['id'])}}" class="btn btn-warning">Edit</a>
        <form action="{{action('Notifications\NotificationsController@destroy', $notification['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>

      @endforeach
