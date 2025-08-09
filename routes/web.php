<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [UserController::class, 'signUpForm'])->name('signup.form');
Route::post('/signup', [UserController::class, 'signUp']);

Route::get('/login', [UserController::class, 'loginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/main', [UserController::class, 'main'])->name('main');
