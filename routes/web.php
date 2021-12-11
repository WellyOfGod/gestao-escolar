<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('auth', [LoginController::class, 'auth'])->name('auth');
Route::get('home', [LoginController::class, 'home'])->middleware('auth')->name('home');
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('admin', [LoginController::class, 'admin'])->middleware(['auth', 'isAdmin'])->name('admin');


