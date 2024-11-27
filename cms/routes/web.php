<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'/auth/', 'as' => 'auth.'], function (){
    Route::post("/register", [UserController::class, 'register']) -> name("register");
    Route::post("/login", [UserController::class, 'authenticate']) -> name("authenticate");
    Route::post("/logout", [UserController::class, 'logout']) -> name("logout");
});
