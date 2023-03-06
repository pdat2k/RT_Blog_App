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

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login/account', [LoginController::class, 'login'])->name('auth.login.account');

Route::get('/register/user', [UserRegisterController::class, 'index'])->name('auth.user');
Route::post('/register/user/register', [UserRegisterController::class, 'register'])->name('auth.user.register');

Route::get('/register/admin', [AdminRegisterController::class, 'index'])->name('auth.admin');
Route::post('/register/admin/register', [AdminRegisterController::class, 'register'])->name('auth.admin.register');
