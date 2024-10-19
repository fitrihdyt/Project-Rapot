<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MdController;
use App\Http\Controllers\KkController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WmController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SkController;
use App\Http\Controllers\ExportPdfController;
use App\Http\Controllers\AuthController;

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

Route::controller(AuthController::class)->group(function() {
    Route::get('/registration', 'register')->name('auth.register');
    Route::post('/store', 'store')->name('auth.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/auth', 'authentication')->name('auth.authentication');
    Route::get('/home', 'home')->name('auth.home');
    Route::post('/logout', 'logout')->name('auth.logout');

});

Route::middleware(['auth'])->group(function () {
    
    Route::resource('/md', MdController::class);
    Route::resource('/kk', KkController::class);
    Route::resource('/kelas', KelasController::class);
    Route::resource('/guru', GuruController::class);
    Route::resource('/siswa', SiswaController::class);
    Route::resource('/wm', WmController::class);
    Route::resource('/sk', SkController::class);
    
    Route::get('/siswa/{id}/show', [SiswaController::class, 'show'])
        ->name('siswa.show')
        ->middleware('auth');
    Route::get('/siswa/{siswa}/create/nilai', [NilaiController::class, 'create'])
        ->name('nilai.create')
        ->middleware('auth');
    Route::get('/siswa/{siswa}/show', [NilaiController::class, 'showBySiswa'])
        ->name('nilai.siswa.show')
        ->middleware('auth');
    Route::get('/siswa/{siswa}/export-pdf', [SiswaController::class, 'exportPdfNilai'])
        ->name('siswa.exportPdfNilai')
        ->middleware('auth');
    Route::post('/siswa/{siswa_id}/show', [NilaiController::class, 'store'])
        ->name('nilai.store')
        ->middleware('auth');
    Route::delete('/siswa/{id}/delete', [SiswaController::class, 'delete'])
        ->name('siswa.delete')
        ->middleware('auth');

    Route::get('/teaching/{md}', [GuruController::class, 'guruMapelCreate'])
        ->name('teaching.create')
        ->middleware('auth');
    Route::post('/teaching/', [GuruController::class, 'guruMapelStore'])
        ->name('teaching.store')
        ->middleware('auth');

    Route::put('kelas/{kelas}/edit', [KelasController::class, 'edit'])
        ->name('kelas.edit')
        ->middleware('auth');
    Route::put('kelas/{kelas}', [KelasController::class, 'update'])
        ->name('kelas.update')
        ->middleware('auth');
});

Route::get('/', function () {
    return view('master');
})->middleware('auth');
