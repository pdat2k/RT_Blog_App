<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\BlogController as BlogAdminController;
use App\Http\Controllers\User\RegisterController as RegisterUserController;
use App\Http\Controllers\Admin\RegisterController as RegisterAdminController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Blog\LikeController;
use App\Http\Controllers\User\FogotController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\VerificationController;
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

Route::redirect('/', '/user/blogs', 301);

Route::group(['as' => 'user.'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/index', [LoginController::class, 'login'])->name('login.index');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    Route::group(['prefix' => 'register/user'], function () {
        Route::get('/', [RegisterUserController::class, 'index'])->name('register');
        Route::post('/index', [RegisterUserController::class, 'register'])->name('register.index');
    });

    Route::group(['prefix' => 'forgot'], function () {
        Route::get('/', [FogotController::class, 'index'])->name('forgot');
        Route::post('/index', [FogotController::class, 'fogot'])->name('forgot.verify');
    });

    Route::get('email/verify', [VerificationController::class, 'index'])->name('email.verify');
    Route::get('/verify', [VerificationController::class, 'verify'])->name('verify');
    Route::post('/resend/verify', [VerificationController::class, 'resend'])->name('resend.verify');

    Route::prefix('user')->group(function () {
        Route::resource('blogs', BlogController::class)->names([
            'index' => 'home',
            'create' => 'create',
            'show' => 'detail',
            'store' => 'store',
            'destroy' => 'remove',
            'edit' => 'edit',
            'update' => 'update'
        ]);
    });

    Route::prefix('user')->middleware('auth')->group(function () {
        Route::resource('comments', CommentController::class)->names([
            'store' => 'comments.store',
            'destroy' => 'comments.remove',
        ]);
    });

    Route::prefix('user')->middleware('auth')->group(function () {
        Route::resource('likes', LikeController::class)->names([
            'store' => 'likes.add',
            'destroy' => 'likes.remove',
        ]);
    });
});

Route::group(['as' => 'admin.'], function () {
    Route::group(['prefix' => 'register/admin'], function () {
        Route::get('/', [RegisterAdminController::class, 'index'])->name('register');
        Route::post('/index', [RegisterAdminController::class, 'register'])->name('register.index');
    });

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::resource('users', AdminController::class)->names([
            'index' => 'home',
            'destroy' => 'remove',
            'edit' => 'edit',
            'update' => 'update'
        ]);

        Route::resource('blogs', BlogAdminController::class)->names([
            'index' => 'list',
        ]);
    });
});
