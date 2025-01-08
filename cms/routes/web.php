<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;

// tests
Route::get('/api/test',[QuizController::class, 'test']) ->name("test");
Route::post('/api/data_test',[QuizController::class, 'dataTest']) ->name("test_data");

// homepage
Route::get('/', function () {
    return view('welcome');
}) -> name("/");

// routes fr
Route::group(['prefix' => '/api'], function () {

    // user routes
    Route::group(['prefix'=>'/auth', 'as' => 'auth.'], function (){
        Route::post("/register", [UserController::class, 'register']) -> name("register");
        Route::post("/login", [UserController::class, 'authenticate']) -> name("authenticate");
        Route::post("/logout", [UserController::class, 'logout']) -> name("logout");
    });


});
