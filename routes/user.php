<?php
Route::get('/',[\App\Http\Controllers\WebController::class,"home"]);
Route::get("/about",[App\Http\Controllers\WebController::class,"aboutUs"])->middleware("auth");
