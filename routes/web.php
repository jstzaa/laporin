<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('/admin/home', [Admin\AspirasiController::class, 'index'])->name('laporan.admin.show');
    Route::post('/admin/home', [Admin\AspirasiController::class, 'store'])->name('laporan.admin.update');

    Route::get('/admin/kategori', [Admin\KategoriController::class, 'index'])->name('kategori.show');
    Route::post('/admin/kategori', [Admin\KategoriController::class, 'store'])->name('kategori.add');
    Route::get('/admin/kategori/{id}', [Admin\KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/admin/kategori/{id}', [Admin\KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/admin/kategori/{id}', [Admin\KategoriController::class, 'destroy'])->name('kategori.delete');

    Route::get('/admin/daftar-siswa', [Admin\SiswaController::class, 'index'])->name('siswa.show');
    Route::post('/admin/daftar-siswa', [Admin\SiswaController::class, 'store'])->name('siswa.add');
    Route::get('/admin/daftar-siswa/edit-siswa/{id}', [Admin\SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/admin/daftar-siswa/edit-siswa/{id}', [Admin\SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/admin/daftar-siswa/{id}', [Admin\SiswaController::class, 'destroy'])->name('siswa.delete');

    Route::get('/admin/daftar-admin', [Admin\AdminManageController::class, 'index'])->name('admin.show');
    Route::post('/admin/daftar-admin', [Admin\AdminManageController::class, 'store'])->name('admin.add');
    Route::get('/admin/daftar-admin/edit-admin/{id}', [Admin\AdminManageController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/daftar-admin/edit-admin/{id}', [Admin\AdminManageController::class, 'update'])->name('admin.update');
    Route::delete('/admin/daftar-admin/{id}', [Admin\AdminManageController::class, 'destroy'])->name('admin.delete');
});

Route::middleware('auth:siswa')->group(function(){
    Route::get('/siswa/home', [Siswa\AspirasiController::class, 'index'])->name('laporan.siswa.show');
    Route::post('/siswa/home', [Siswa\AspirasiController::class, 'store'])->name('laporan.siswa.add');
    Route::get('/siswa/history', [Siswa\AspirasiController::class, 'showHistory'])->name('history.show');
});
    
Route::middleware('guest.multi')->group(function(){
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('throttle:login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:admin,siswa');