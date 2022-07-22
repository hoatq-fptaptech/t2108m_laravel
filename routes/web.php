<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get("/about",[WebController::class,"aboutUs"]);
// Classes group
Route::group(['prefix'=>'class'],function (){
    Route::get("/class/list",[\App\Http\Controllers\ClassesController::class,"all"]);
});

// Students group
Route::group(['prefix'=>"student"],function (){
    Route::get("/list",[\App\Http\Controllers\StudentController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\StudentController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\StudentController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\StudentController::class,'edit']);
    Route::put("/edit/{student}",[\App\Http\Controllers\StudentController::class,'update']);
    Route::delete("/delete/{student}",[\App\Http\Controllers\StudentController::class,'delete']);
});
