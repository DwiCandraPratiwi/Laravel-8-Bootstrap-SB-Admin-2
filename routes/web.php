<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;


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


//Login Register
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/registerProses', [AuthController::class, 'registerProses']);
    Route::post('/loginProses', [AuthController::class, 'loginProses']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:petugas', 'admin')->prefix('admin')->group(function(){
        Route::get('/', [PetugasController::class, 'homeAdmin']);
        Route::resource('petugas', PetugasController::class);
        Route::get('/pengaduan', [PengaduanController::class, 'listPengaduanAdmin'])->name('admin.pengaduan');
        Route::get('/laporan', [PetugasController::class, 'laporanView']);
    });

    Route::middleware('auth:petugas')->prefix('petugas')->group(function(){
        Route::get('/', [PetugasController::class, 'homePetugas']);
        Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index'); //aku nambahin ini

    });

    Route::middleware('auth:masyarakat')->prefix('masyarakat')->group(function(){
        Route::get('/', [MasyarakatController::class, 'dashboard']);
        Route::get('/listPengaduan', [MasyarakatController::class, 'listPengaduan'])->name('masyarakat.listPengaduan'); //aku nambahin ini
        Route::resource('pengaduan', PengaduanController::class);
    });





