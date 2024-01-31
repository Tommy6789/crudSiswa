<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/siswa',[SiswaController::class,"index"])->name('siswa');
Route::get('/siswa/create',[SiswaController::class,"create"])->name('siswa.create');
Route::post('/siswa/post',[SiswaController::class, "store"])->name('siswa.post');
Route::get('/siswa/{id}/edit',[SiswaController::class,"edit"])->name('siswa.edit');
Route::put('siswa{id}', [SiswaController::class,"update"])->name('siswa.update');
Route::delete('/siswa{id}', [SiswaController::class,"destroy"])->name('siswa.destroy');

Route::resource('penulis', PenulisController::class);

Route::resource('buku', BukuController::class);