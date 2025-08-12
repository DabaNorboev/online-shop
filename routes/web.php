<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [AuthController::class, 'getSignUp'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::view('/about' , 'about')->name('about')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password')->middleware('auth');

Route::get('/main', [ProductController::class, 'getMain'])->name('main')->middleware('auth');
Route::get('/catalog/{categoryName?}', [ProductController::class, 'getCatalog'])->name('catalog')->middleware('auth');


