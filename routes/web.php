<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('/admin/home', [Admin\AspirasiController::class, 'index'])->name('show.home.admin');
    Route::post('/admin/home', [Admin\AspirasiController::class, 'store'])->name('update.laporan');

    Route::get('/admin/kategori', [Admin\KategoriController::class, 'index'])->name('show.kategori');
    Route::post('/admin/kategori', [Admin\KategoriController::class, 'store'])->name('add.kategori');
    Route::put('/admin/kategori/{id}', [Admin\KategoriController::class, 'update'])->name('update.kategori');
    Route::delete('/admin/kategori/{id}', [Admin\KategoriController::class, 'destroy'])->name('delete.kategori');

    Route::get('/admin/daftar-siswa', [Admin\SiswaController::class, 'index'])->name('show.siswa');
    Route::post('/admin/daftar-siswa', [Admin\SiswaController::class, 'store'])->name('add.siswa');
    Route::put('/admin/daftar-siswa/{id}', [Admin\SiswaController::class, 'update'])->name('update.siswa');
    Route::delete('/admin/daftar-siswa/{id}', [Admin\SiswaController::class, 'destroy'])->name('delete.siswa');

    Route::get('/admin/daftar-admin', [Admin\AdminManageController::class, 'index'])->name('show.admin');
    Route::post('/admin/daftar-admin', [Admin\AdminManageController::class, 'store'])->name('add.admin');
    Route::put('/admin/daftar-admin/{id}', [Admin\AdminManageController::class, 'update'])->name('update.admin');
    Route::delete('/admin/daftar-admin/{id}', [Admin\AdminManageController::class, 'destroy'])->name('delete.admin');
});

Route::middleware('auth:siswa')->group(function(){
    Route::get('/siswa/home', [Siswa\AspirasiController::class, 'index'])->name('show.home.siswa');
    Route::post('/siswa/home', [Siswa\AspirasiController::class, 'store'])->name('add.laporan');
    Route::get('/siswa/history', [Siswa\AspirasiController::class, 'showHistory'])->name('show.history.siswa');
});
    
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');