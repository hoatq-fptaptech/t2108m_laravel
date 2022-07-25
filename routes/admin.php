<?php
Route::get('/', function () {
    return view('welcome');
});
// Classes group
Route::group(['prefix'=>'class'],function (){
    Route::get("/list",[\App\Http\Controllers\ClassesController::class,"all"]);
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
