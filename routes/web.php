<?php

use App\Http\Controllers\DatadokterController;
use App\Http\Controllers\DatahewanController;
use App\Http\Controllers\DatapemilikController;
use App\Http\Controllers\TransaksiController;
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
    return view('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::resource('datadokter',DatadokterController::class);
Route::resource('datapemilik',DatapemilikController::class);
Route::resource('datahewan',DatahewanController::class);
Route::resource('transaksi',TransaksiController::class);
