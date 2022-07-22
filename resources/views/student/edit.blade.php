@extends("layout")
@section("content-header")
    <h1>Edit a student '{{$student->name}}'
        <a href="{{url("/student/list")}}" class="btn btn-outline-info float-right">
            Back to list
        </a>
    </h1>
@endsection
@section("main")
    <div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url("/student/edit",['student'=>$student->sid])}}">
                @csrf
                @method("put")
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input disabled value="{{$student->sid}}" type="text" name="sid" class="form-control" id="exampleInputEmail1" placeholder="Enter ID">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" value="{{$student->name}}" name="name" class="form-control" id="exampleInputPassword1" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Birthday</label>
                        <input type="date" value="{{$student->birthday}}" name="birthday" class="form-control" id="exampleInputPassword2" placeholder="Enter Birthday">
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select name="cid" class="form-control">
                            @foreach($classesList as $item)
                                <option @if($student->cid == $item->cid) selected @endif value="{{$item->cid}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
