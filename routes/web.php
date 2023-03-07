<?php

use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
})->name('home');

Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/account', [LoginController::class, 'login'])->name('auth.login.account');
});

Route::prefix('register')->group(function () {
    Route::get('/user', [UserRegisterController::class, 'index'])->name('auth.user');
    Route::post('/user/register', [UserRegisterController::class, 'register'])->name('auth.user.register');
    Route::get('/admin', [AdminRegisterController::class, 'index'])->name('auth.admin');
    Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('auth.admin.register');
});
