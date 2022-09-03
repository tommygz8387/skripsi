<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\WaktuController;

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
    return view('auth.login');
})->middleware('guest');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'remember' => false,
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout1');

// grup controller guru
Route::controller(GuruController::class)->group(function(){
    Route::get('/pages/guru', 'index')->name('guru.index');
    Route::post('/pages/guru', 'store')->name('guru.store');
    Route::post('/pages/guru/{id}', 'update')->name('guru.update');
    Route::get('/pages/guru/delete/{id}', 'destroy')->name('guru.delete');
});

// grup controller kelas
Route::controller(KelasController::class)->group(function(){
    Route::get('/pages/kelas', 'index')->name('kelas.index');
    Route::post('/pages/kelas', 'store')->name('kelas.store');
    // Route::get('/pages/kelas/{id}', 'edit')->name('kelas.edit');
    Route::post('/pages/kelas/{id}', 'update')->name('kelas.update');
    Route::get('/pages/kelas/delete/{id}', 'destroy')->name('kelas.delete');
});

// grup controller ruang
Route::controller(RuangController::class)->group(function(){
    Route::get('/pages/ruang', 'index')->name('ruang.index');
    Route::post('/pages/ruang', 'store')->name('ruang.store');
    Route::get('/pages/ruang/{id}', 'edit')->name('ruang.edit');
    Route::post('/pages/ruang/{id}', 'update')->name('ruang.update');
    Route::get('/pages/ruang/delete/{id}', 'destroy')->name('ruang.delete');
});

// grup controller mapel
Route::controller(MapelController::class)->group(function(){
    Route::get('/pages/mapel', 'index')->name('mapel.index');
    Route::post('/pages/mapel', 'store')->name('mapel.store');
    // Route::get('/pages/mapel/{id}', 'edit')->name('mapel.edit');
    Route::post('/pages/mapel/{id}', 'update')->name('mapel.update');
    Route::get('/pages/mapel/delete/{id}', 'destroy')->name('mapel.delete');
});

// grup controller waktu
Route::controller(WaktuController::class)->group(function(){
    Route::get('/pages/waktu', 'index')->name('waktu.index');
    Route::post('/pages/waktu', 'store')->name('waktu.store');
    // Route::get('/pages/waktu/{id}', 'edit')->name('waktu.edit');
    Route::post('/pages/waktu/{id}', 'update')->name('waktu.update');
    Route::get('/pages/waktu/delete/{id}', 'destroy')->name('waktu.delete');
});