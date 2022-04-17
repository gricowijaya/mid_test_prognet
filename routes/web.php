<?php

use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\AdminResponseController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('users/')->name('users.')->group(function () {
    Route::get('/index', [KeluhanController::class, 'index'])->name('daftar-keluhan');
    Route::get('/create', [KeluhanController::class, 'create'])->name('tambah-data-keluhan');
    Route::post('/{id}/destroy', [KeluhanController::class, 'destroy'])->name('hapus-data-keluhan');
    Route::get('/{id}/edit', [KeluhanController::class, 'edit'])->name('edit-data-keluhan');
    Route::post('/store', [KeluhanController::class, 'store'])->name('simpan-data-keluhan');
    Route::get('/{id}/show', [KeluhanController::class, 'show'])->name('detail-data-keluhan');
    Route::post('/{id}/update', [KeluhanController::class, 'update'])->name('simpan-data-edit-keluhan');

    Route::middleware('auth:users', 'verified')->group(function () {
          Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });
});

Route::prefix('admins/')->name('admins.')->group(function () {

    Route::get('/', function() {
        return redirect()->route('admins.login');
    });

    Route::middleware('guest')->group(function () { 
        Route::get('login', [AdminAuthController::class, 'index'])->name('login-index');
        Route::post('login', [AdminAuthController::class, 'login'])->name('login');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    });

    Route::middleware('auth:admins')->group(function () {
        Route::get('/index', [AdminResponseController::class, 'index'])->name('daftar-keluhan');
        Route::get('/show/{id}', [AdminResponseController::class, 'show'])->name('detail-data-keluhan');
        Route::get('/{id}/create', [AdminResponseController::class, 'create'])->name('tambah-data-keluhan');
        Route::get('/{id}/edit', [AdminResponseController::class, 'edit'])->name('edit-data-keluhan');
        Route::get('/{id}/destroy', [AdminResponseController::class, 'destroy'])->name('hapus-data-keluhan');
        Route::post('/{id}/update', [AdminResponseController::class, 'update'])->name('simpan-data-edit-keluhan');
        Route::post('/store', [AdminResponseController::class, 'store'])->name('simpan-data-keluhan');
    });
});
