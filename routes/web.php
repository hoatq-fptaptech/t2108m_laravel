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
Route::get("/class/list",[\App\Http\Controllers\ClassesController::class,"all"]);
// Students group
Route::get("/student/list",[\App\Http\Controllers\StudentController::class,"all"]);
Route::get("/student/create",[\App\Http\Controllers\StudentController::class,"form"]);
Route::post("/student/create",[\App\Http\Controllers\StudentController::class,"create"]);
Route::get("/student/edit/{id}",[\App\Http\Controllers\StudentController::class,'edit']);
Route::put("/student/edit/{student}",[\App\Http\Controllers\StudentController::class,'update']);
Route::delete("/student/delete/{student}",[\App\Http\Controllers\StudentController::class,'delete']);
