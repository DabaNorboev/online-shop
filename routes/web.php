<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [UserController::class, 'getSignUp'])->name('signup.form');
Route::post('/signup', [UserController::class, 'signUp'])->name('signup');

Route::get('/login', [UserController::class, 'getLogin'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::view('/about' , 'about')->name('about')->middleware('auth');

Route::get('/main', [ProductController::class, 'getMain'])->name('main')->middleware('auth');
Route::get('/profile', [UserController::class, 'getProfile'])->name('profile')->middleware('auth');
Route::get('/catalog/{categoryName?}', [ProductController::class, 'getCatalog'])->name('catalog')->middleware('auth');


