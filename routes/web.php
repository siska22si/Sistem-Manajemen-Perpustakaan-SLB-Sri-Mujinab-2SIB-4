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

Route::get('/pages/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/pages/tables', function () {
    return view('pages.tables');
});

Route::get('/pages/ptofile', function () {
    return view('pages.profile');
});

Route::get('/pages/sign-up', function () {
    return view('pages.sign-up');
});

Route::get('/pages/sign-in', function () {
    return view('pages.sign-in');
});


// Route::delete('pustakawan/{pustakawan}', 'PustakawanController@destroy')->name('pustakawan.destroy');
// // Contoh definisi rute untuk halaman pengeditan
// Route::get('pustakawan/{pustakawan}/edit', 'PustakawanController@edit')->name('pustakawan.edit');
