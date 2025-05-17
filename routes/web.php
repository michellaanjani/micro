<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/account', [DashboardController::class, 'account'])->name('account');

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/productss', [ProductController::class, 'index1']);
});



Route::get('/', function () {
    return redirect()->route('login');
});
// Route::get('/login', 'LoginController@index')->name('login');
// Route::post('/login', 'LoginController@authenticate')->name('login.post');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/regis', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'doRegister'])->name('register.do');

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/productss', [ProductController::class, 'index1']);




