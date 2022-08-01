@extends("layout")
@section("content-header")
    <h1>Classes List</h1>
@endsection
@section("main")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Room</th>
                            <th>Students count</th>
                            <th>Created At</th>
                            <th>Update At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($classes as $item)
                        <tr>
                            <td>{{$item->cid}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->room}}</td>
                            <td>{{$item->students_count}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $classes->links() !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section("custom_script")
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
       // Pusher.logToConsole = true;
        var pusher = new Pusher('{{env("PUSHER_APP_KEY")}}', {
            cluster: '{{env("PUSHER_APP_CLUSTER")}}'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            $("#notification-badge").text(1);
            $("#notification-badge").show();
            $("#no-notify").hide();
            $("#has-notify").show();
            $("#has-notify .msg").text(data);
        });
    </script>
@endsection
