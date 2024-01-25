<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']); // Redirect root URL to login page

Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/listbuku', [HomeController::class, 'listbuku'])->name('listbuku');
Route::get('/detailbuku/{id}', [HomeController::class, 'detailbuku'])->name('detailbuku');
Route::get('/listkategori', [HomeController::class, 'listkategori'])->name('listkategori');
Route::get('/pustakawan', function () {
    return view('layouts.home');
})->middleware('auth')->name('pustakawan');

// Route::get('/home', function () {
//     return view('layouts.home');
// })->middleware('auth')->name('home');

Route::resource('/layouts', \App\Http\Controllers\HomeController::class);
Route::resource('/buku', \App\Http\Controllers\BukuController::class);
Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
Route::resource('/rak', \App\Http\Controllers\RakController::class);
Route::resource('/peminjaman', \App\Http\Controllers\PeminjamanController::class);
?>