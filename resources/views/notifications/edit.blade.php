
        <form method="post" action="{{action('Notifications\NotificationsController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <label for="name">Title:</label>
            <input type="text" class="form-control" name="title" value="{{$notifications->title}}">
        </div>
        <div class="row">
              <label for="email">Description</label>
              <input type="text" class="form-control" name="description" value="{{$notifications->description}}">
        </div>
        <div class="row">
              <label for="number">send_time:</label>
              <input type="text" class="form-control" name="send_time" value="{{$notifications->send_time}}">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
        </div>
      </form>
