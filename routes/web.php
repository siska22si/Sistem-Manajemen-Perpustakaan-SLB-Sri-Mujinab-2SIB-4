<?php

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
    return view('welcome');
});

//use App\Http\Controllers\peminjamanbukuController;

Route::resource('peminjamanbuku',\App\Http\Controllers\peminjamanbukuController::class);


// web.php

// web.php

//use App\Http\Controllers\pengembalianbukuController;

//Route::resource('pengembalian',\App\Models\pengembalianbukuController::class);

Route::resource('/pengembalianbuku', \App\Http\Controllers\pengembalianbukuController::class);