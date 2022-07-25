@extends("layout")
@section("content-header")
    <h1>Students List
        <a href="{{url("/admin/student/create")}}" class="btn btn-outline-info float-right">
            Create Student
        </a>
    </h1>
@endsection
@section("main")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form method="get" action="{{url("/admin/student/list")}}">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 450px;">
                                <select name="classID" class="form-control float-right">
                                    <option value="">Select Class...</option>
                                    @foreach($classesList as $item)
                                        <option @if(app("request")->input("classID") == $item->cid) selected @endif value="{{$item->cid}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" value="{{app("request")->input("name")}}" name="name" class="form-control float-right" placeholder="Search by name">
                                <input type="date" value="{{app("request")->input("from")}}" name="from" class="form-control float-right" placeholder="Birthday from">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Class</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $item)
                        <tr>
                            <td>{{$item->sid}}</td>
                            <td><img src="{{$item->getImage()}}" class="img-circle" width="80"/></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->classes->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td><a href="{{url('/admin/student/edit',['id'=>$item->sid])}}" class="btn btn-outline-info">Edit</a>
                                <form action="{{url("/admin/student/delete",['student'=>$item->sid])}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" onclick="return confirm('Delete Student {{$item->name}}?');" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $students->appends(app("request")->input())->links() !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
