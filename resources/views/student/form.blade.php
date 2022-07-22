@extends("layout")
@section("content-header")
    <h1>Create a student
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
            <form role="form" method="post" action="{{url("/student/create")}}" enctype="multipart/form-data">
                @csrf
                @method("post")
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" value="{{old("sid")}}" name="sid" class="form-control" id="exampleInputEmail1" placeholder="Enter ID">
                        @error("sid")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" value="{{old("name")}}" name="name" class="form-control" id="exampleInputPassword1" placeholder="Enter Name">
                        @error("name")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error("image")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Birthday</label>
                        <input type="date"  value="{{old("birthday")}}" name="birthday" class="form-control" id="exampleInputPassword2" placeholder="Enter Birthday">
                        @error("birthday")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select name="cid" class="form-control">
                            @foreach($classesList as $item)
                                <option @if(old("cid") == $item->cid) selected @endif value="{{$item->cid}}">{{$item->name}}</option>
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
