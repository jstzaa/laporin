<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('/admin/home', [AdminController::class, 'index'])->name('show.home.admin');
});
Route::middleware('auth:siswa')->group(function(){
    Route::get('/siswa/home', [SiswaController::class, 'index'])->name('show.home.siswa');
});
    
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');