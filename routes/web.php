<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController, StudentController, CourseController, DisciplineController};



Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('auth', [LoginController::class, 'auth'])->name('auth');

Route::group(['middleware' => 'auth'], function(){
    //Routes Users
    Route::get('home', [LoginController::class, 'home'])->name('home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('student', StudentController::class);
    Route::resource('course', CourseController::class);
    Route::resource('discipline', DisciplineController::class);

    //Routes Admin
    Route::group(['middleware' => 'isAdmin'], function(){
        Route::get('admin', [LoginController::class, 'admin'])->name('admin');
    });
});





