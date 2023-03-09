<?php

use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::group(['prefix' => 'login', 'as' => 'auth.'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/account', [LoginController::class, 'login'])->name('login.account');
});

Route::group(['prefix' => 'login', 'as' => 'auth.'], function () {
    Route::get('/user', [RegisterController::class, 'user'])->name('user');
    Route::post('/user/register', [RegisterController::class, 'registerUser'])->name('user.register');
    Route::get('/admin', [RegisterController::class, 'admin'])->name('admin');
    Route::post('/admin/register', [RegisterController::class, 'registerAdmin'])->name('admin.register');
});

Route::get('/forgot', function () {
    return view('auth.forget');
})->name('auth.forgot');

Route::get('/create-blog', function () {
    return view('layouts.create');
})->name('post.create');