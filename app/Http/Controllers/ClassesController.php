<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function all(){
//        $classes = Classes::all();
//        $classes = Classes::where("cid",'like','TH1%')->get();
//        $classes = Classes::orderBy("name","asc")
//            ->select('cid','name','room','created_at','updated_at')
//            ->limit(5)
//            ->skip(5)
//            ->get();
        $classes =  Classes::withCount("students")->simplePaginate(5);
//        dd($classes);
        return view("classes.class-list",[
            "classes"=>$classes
        ]);
    }
}
