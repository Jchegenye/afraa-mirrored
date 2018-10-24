
      <form method="post" action="{{url('notifications')}}" enctype="multipart/form-data">
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
                <p>send_time</p>
            <input type="text" class="form-control" name="send_time">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
