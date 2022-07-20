<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
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
       Student::create(
           [
               "sid"=>$request->get("sid"),
               "name"=>$request->get("name"),
               "birthday"=>$request->get("birthday"),
               "cid"=>$request->get("cid"),
           ]
       );
       return redirect()->to("/student/list");
    }
}
