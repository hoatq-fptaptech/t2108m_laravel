<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WebController extends Controller
{
    public function home(){
        if(!Cache::has("home_data")){
            $classes = Classes::all();
            $students = Student::with("classes")->get();
            $subjects = Subject::all();
            $home_data = [
                'classes'=>$classes,
                'students'=>$students,
                'subject'=>$subjects,
            ];
            // caching
            Cache::put("home_data",$home_data,Carbon::now()->addDays(2));

//            Cache::forever("home_data",$home_data);
        }

        return view('welcome',Cache::get("home_data"));
    }

    public function aboutUs(){
        return view("about-us");
    }
}
