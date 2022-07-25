<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get("/about",[App\Http\Controllers\WebController::class,"aboutUs"])->middleware("auth");
