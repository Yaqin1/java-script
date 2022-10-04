<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuruController,
    KelasController,
    MapelController,
    SiswaController,
    DashboardController
};

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
    return view('layout.app');
});

Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
Route::resource('/guru', GuruController::class);

Route::get('/kelas/data', [KelasController::class, 'data'])->name('kelas.data');
Route::resource('/kelas', KelasController::class);

Route::get('/siswa/data', [SiswaController::class, 'data'])->name('siswa.data');
Route::resource('/siswa', SiswaController::class);

Route::get('/mapel/data', [MapelController::class, 'data'])->name('mapel.data');
Route::resource('/mapel', MapelController::class);

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');