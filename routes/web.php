<?php

use App\Http\Controllers\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    if (Auth()->check() === true) {
        return redirect('logout');
    } else {
        return redirect('login');
    }
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/logout', function () {
    Auth()->logout();
    return redirect('login');
})->name('logout');

Route::get('/register', function () {
    return redirect('login');
})->name('register');

Route::post('/tambahKarya', [App\Http\Controllers\HomeController::class, 'nambahKaryawan'])->name('tambahKarya');
Route::post('/tambahCust', [App\Http\Controllers\Pelanggan::class, 'postUsers'])->name('tambahCust');
Route::post('/updateSts', [App\Http\Controllers\Pelanggan::class, 'updateUsers'])->name('updateSts');
Route::post('/updateKarya', [App\Http\Controllers\HomeController::class, 'roleChange'])->name('updateKarya');
Route::post('/deleteKarya', [App\Http\Controllers\HomeController::class, 'deletekaryawan'])->name('deleteKarya');
Route::post('/deleteCust', [App\Http\Controllers\Pelanggan::class, 'deleteUsers'])->name('deleteCust');
