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

// routes/web.php

use App\Http\Controllers\PustakawanController;

Route::resource('pustakawan', PustakawanController::class);

use App\Http\Controllers\RakController;

Route::resource('rak', RakController::class);

Route::get('/pages', function () {
    return view('pages.dashboard');
});