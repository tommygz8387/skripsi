<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\WaktuController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\JKhususController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\TingkatController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AmpuController;

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

// grup controller hari
Route::controller(HariController::class)->group(function(){
    // Route::get('/pages/hari', 'index')->name('hari.index');
    Route::post('/pages/hari', 'store')->name('hari.store');
    // Route::get('/pages/hari/{id}', 'edit')->name('hari.edit');
    Route::post('/pages/hari/{id}', 'update')->name('hari.update');
    Route::get('/pages/hari/delete/{id}', 'destroy')->name('hari.delete');
});

// grup controller jurusan
Route::controller(JurusanController::class)->group(function(){
    Route::get('/pages/jurusan', 'index')->name('jurusan.index');
    Route::post('/pages/jurusan', 'store')->name('jurusan.store');
    Route::get('/pages/jurusan/{id}', 'edit')->name('jurusan.edit');
    Route::post('/pages/jurusan/{id}', 'update')->name('jurusan.update');
    Route::get('/pages/jurusan/delete/{id}', 'destroy')->name('jurusan.delete');
});

// grup controller slot
Route::controller(SlotController::class)->group(function(){
    Route::get('/pages/slot', 'index')->name('slot.index');
    Route::post('/pages/slot', 'store')->name('slot.store');
    // Route::get('/pages/slot/{id}', 'edit')->name('slot.edit');
    Route::post('/pages/slot/{id}', 'update')->name('slot.update');
    Route::get('/pages/slot/delete/{id}', 'destroy')->name('slot.delete');
});

// grup controller jam khusus
Route::controller(JKhususController::class)->group(function(){
    Route::get('/pages/jkhusus', 'index')->name('jkhusus.index');
    Route::post('/pages/jkhusus', 'store')->name('jkhusus.store');
    // Route::get('/pages/jkhusus/{id}', 'edit')->name('jkhusus.edit');
    Route::post('/pages/jkhusus/{id}', 'update')->name('jkhusus.update');
    Route::get('/pages/jkhusus/delete/{id}', 'destroy')->name('jkhusus.delete');
});

// grup controller penjadwalan manual
Route::controller(ManualController::class)->group(function(){
    Route::get('/jadwal/manual', 'index')->name('manual.index');
    Route::post('/jadwal/manual', 'store')->name('manual.store');
    // Route::get('/jadwal/manual/{id}', 'edit')->name('manual.edit');
    Route::post('/jadwal/manual/{id}', 'update')->name('manual.update');
    Route::get('/jadwal/manual/delete/{id}', 'destroy')->name('manual.delete');
});

// grup controller tingkat
Route::controller(TingkatController::class)->group(function(){
    // Route::get('/pages/tingkat', 'index')->name('tingkat.index');
    Route::post('/pages/tingkat', 'store')->name('tingkat.store');
    // Route::get('/pages/tingkat/{id}', 'edit')->name('tingkat.edit');
    Route::post('/pages/tingkat/{id}', 'update')->name('tingkat.update');
    Route::get('/pages/tingkat/delete/{id}', 'destroy')->name('tingkat.delete');
});

// grup controller ampu
Route::controller(AmpuController::class)->group(function(){
    Route::get('/pages/ampu', 'index')->name('ampu.index');
    Route::post('/pages/ampu', 'store')->name('ampu.store');
    // Route::get('/pages/ampu/{id}', 'edit')->name('ampu.edit');
    Route::post('/pages/ampu/{id}', 'update')->name('ampu.update');
    Route::get('/pages/ampu/delete/{id}', 'destroy')->name('ampu.delete');
});


// grup controller Jadwal
Route::controller(JadwalController::class)->group(function(){
    Route::get('/pages/jadwalGuru', 'guru')->name('jadwal.guru');
    Route::get('/pages/jadwalKelas', 'kelas')->name('jadwal.kelas');
    // Route::post('/pages/jadwal', 'store')->name('jadwal.store');
    // Route::get('/pages/jadwal/{id}', 'edit')->name('jadwal.edit');
    // Route::post('/pages/jadwal/{id}', 'update')->name('jadwal.update');
    // Route::get('/pages/jadwal/delete/{id}', 'destroy')->name('jadwal.delete');
    Route::post('/pages/jadwalGuru/filter', 'findGuru')->name('jadwal.findGuru');
    Route::post('/pages/jadwalKelas/filter', 'findKelas')->name('jadwal.findKelas');
});