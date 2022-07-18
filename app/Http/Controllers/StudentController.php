<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function all(){
//        $classTable = with(new Classes)->getTable();
//        $studentTable = with(new Student())->getTable();
//        $students = Student::leftJoin($classTable, $studentTable.".cid",'=', $classTable.".cid")
//            ->select($studentTable.'.*',$classTable.'.name as className',$classTable.'.room')
//            ->simplePaginate(10);
        $students = Student::with("classes")->simplePaginate(10);
        //dd($students);
        return view("student.students-list",[
            'students'=>$students
        ]);
    }
}
