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

        function render_notification_html(description,created_at){
            return  "<a href=\"#\" class=\"dropdown-item\">\n" +
                "                    <div class=\"media\">\n" +
                "                        <img src=\"dist/img/user1-128x128.jpg\" alt=\"User Avatar\" class=\"img-size-50 mr-3 img-circle\">\n" +
                "                        <div class=\"media-body\">\n" +
                "                            <p class=\"text-sm msg\">"+description+"</p>\n" +
                "                            <p class=\"text-sm text-muted\"><i class=\"far fa-clock mr-1\"></i>\n" +
                "                                "+created_at+"</p>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </a>"
        }
        // Enable pusher logging - don't include this in production
       // Pusher.logToConsole = true;
        var pusher = new Pusher('{{env("PUSHER_APP_KEY")}}', {
            cluster: '{{env("PUSHER_APP_CLUSTER")}}'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            $("#notification-badge").text(parseInt($("#notification-badge").text())+1);
            $("#notification-badge").show();
            data = JSON.parse(data);
            $("#notifications").prepend(render_notification_html(data.description,data.created_at))
        });
    </script>
@endsection
