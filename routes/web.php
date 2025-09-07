<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\CartController;
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
Route::put('/profile/update_pass', [ProfileController::class, 'updatePassword'])->name('profile.update.password')->middleware('auth');

Route::get('/main', [ProductController::class, 'getMain'])->name('main')->middleware('auth');
Route::get('/catalog/{categoryName?}', [ProductController::class, 'getCatalog'])->name('catalog')->middleware('auth');
Route::get('/product/{productId}', [ProductController::class, 'getProduct'])->name('product')->middleware('auth');

Route::get('/cart', [CartController::class, 'getCart'])->name('cart')->middleware('auth');
Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('product.add')->middleware('auth');
Route::delete('/cart/delete/{productId}', [CartController::class, 'delete'])->name('product.delete')->middleware('auth');
Route::patch('/cart/update/{productId}', [CartController::class, 'update'])->name('product.update')->middleware('auth');
Route::patch('/cart/decrease/{productId}', [CartController::class, 'decrease'])->name('product.decrease')->middleware('auth');
Route::patch('/cart/increase/{productId}', [CartController::class, 'increase'])->name('product.increase')->middleware('auth');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear')->middleware('auth');
