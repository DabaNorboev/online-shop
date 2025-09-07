<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [AuthController::class, 'getRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'getLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::view('/about' , 'pages.about')->name('about')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update')->middleware('auth');

Route::get('/main', [ProductController::class, 'getMain'])->name('main')->middleware('auth');
Route::get('/catalog/{categoryName?}', [ProductController::class, 'index'])->name('catalog')->middleware('auth');
Route::get('/products/{productId}', [ProductController::class, 'getProduct'])->name('product')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::post('/cart/items/{productId}', [CartController::class, 'addItem'])->name('cart.items.add')->middleware('auth');
Route::delete('/cart/items/{userProductId}/delete', [CartController::class, 'deleteItem'])->name('cart.items.delete')->middleware('auth');
Route::patch('/cart/items/{userProductId}/update', [CartController::class, 'updateItem'])->name('cart.items.update')->middleware('auth');
Route::patch('/cart/items/{userProductId}/decrease', [CartController::class, 'decreaseItem'])->name('cart.items.decrease')->middleware('auth');
Route::patch('/cart/items/{userProductId}/increase', [CartController::class, 'increaseItem'])->name('cart.items.increase')->middleware('auth');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear')->middleware('auth');
