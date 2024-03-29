<?php

namespace App\Http\Controllers;

use App\Events\CreateAStudent;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StudentController extends Controller
{
    private $_GRID_URL = "/admin/student/list";

    public function all(Request $request){
//        $classTable = with(new Classes)->getTable();
//        $studentTable = with(new Student())->getTable();
//        $students = Student::leftJoin($classTable, $studentTable.".cid",'=', $classTable.".cid")
//            ->select($studentTable.'.*',$classTable.'.name as className',$classTable.'.room')
//            ->simplePaginate(10);
        $classesList = Classes::all();
        $paramName = $request->get("name");
        $paramClassID = $request->get("classID");
        $paramFromDate = $request->get("from");
        $students = Student::BirthdayFrom($paramFromDate)->BirthdayTo("")->ClassFilter($paramClassID)->Search($paramName)
            ->with("classes")->simplePaginate(10);
        return view("student.students-list",[
            'students'=>$students,
            'classesList'=>$classesList
        ]);
    }

    public function form(){
        $classesList = Classes::all();
        return view("student.form",['classesList'=>$classesList]);
    }

    public function create(Request $request){
        $request->validate([
            'sid'=> 'required|string|unique:students',
            'name'=>'required',
            'birthday'=>'required',
            'image'=> "image|mimes:jpeg,png,jpg,gif"
        ],[
            'required'=>'Vui lòng nhập thông tin',
            'image'=>'Vui lòng nhập đúng ảnh',
            'mines'=>'Nhập đúng định dạng ảnh'
        ]);
       $image = null;
       if($request->hasFile("image")){
           $file = $request->file("image");
           $path = "uploads/";
           $fileName = time().rand(0,9).$file->getClientOriginalName();
           $file->move($path,$fileName);
           $image = $path.$fileName;
       }
        $student = Student::create(
           [
               "sid"=>$request->get("sid"),
               "name"=>$request->get("name"),
               'image'=>$image,
               "birthday"=>$request->get("birthday"),
               "cid"=>$request->get("cid"),
           ]
       );
       // them data trong table notifications
        // notify cho admin
       // clear cache
       event(new CreateAStudent($student));

       return redirect()->to($this->_GRID_URL)->with("success","Create student successfully");
    }

    public function edit($id){
        $classesList = Classes::all();
        $student = Student::find($id);// 1 object Student with id
        return view('student.edit',[
            'student'=>$student,
            'classesList'=>$classesList
        ]);
    }

    public function update(Request $request,Student $student){
        $request->validate([
            'name'=>'required',
            'birthday'=>'required',
           // 'image'=> "image|mimes:jpeg,png,jpg,gif"
        ],[
            'required'=>'Vui lòng nhập thông tin',
            'image'=>'Vui lòng nhập đúng ảnh',
            'mines'=>'Nhập đúng định dạng ảnh'
        ]);
        $image = $student->image;
        if($request->hasFile("image")){
            $file = $request->file("image");
            $path = "uploads/";
            $fileName = time().rand(0,9).$file->getClientOriginalName();
            $file->move($path,$fileName);
            $image = $path.$fileName;
        }
        $student->update([
            "name"=>$request->get("name"),
            "birthday"=>$request->get("birthday"),
            "image"=>$image,
            "cid"=>$request->get("cid"),
        ]);
        return redirect()->to($this->_GRID_URL)->with("success","Update student successfully");
    }

    public function delete(Student $student){
        try{
            $student->delete();
            return redirect()->to($this->_GRID_URL)->with("success","Delete student successfully");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Delete fail");
        }
    }
}
