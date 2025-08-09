<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [UserController::class, 'getSignUp'])->name('signup.form');
Route::post('/signup', [UserController::class, 'signUp']);

Route::get('/login', [UserController::class, 'getLogin'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/main', [ProductController::class, 'getMain'])->name('main');
