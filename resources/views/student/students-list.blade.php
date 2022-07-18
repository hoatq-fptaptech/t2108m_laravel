@extends("layout")
@section("content-header")
    <h1>Students List</h1>
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
                            <th>Birth</th>
                            <th>Class</th>
                            <th>Created At</th>
                            <th>Update At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $item)
                        <tr>
                            <td>{{$item->sid}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->classes->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $students->links() !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
