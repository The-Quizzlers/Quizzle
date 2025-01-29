<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;

// tests
Route::get('/api/tests/quiz', [QuizController::class, 'test']) ->name("quiz.test");
Route::post('/api/dataTest', [QuizController::class, 'dataTest']) -> name("data.test");

// homepage
Route::get('/', function () {
    return view('welcome');
}) -> name("/");

// routes fr
Route::group(['prefix' => '/api'], function () {

    // user routes
    Route::group(['prefix'=>'/auth', 'as' => 'auth.'], function (){
        Route::post("/register", [UserController::class, 'register']) -> name("register");
        Route::post("/login", [UserController::class, 'login']) -> name("login");
        Route::post("/logout", [UserController::class, 'logout']) -> name("logout");
    });


});
