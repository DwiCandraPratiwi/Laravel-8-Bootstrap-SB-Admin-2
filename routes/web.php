<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;

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

    Route::get('/home', function(){
        return view('masyarakat.home');
    })->name('masyarakat')->middleware('auth:masyarakat');

    Route::middleware('auth:petugas', 'admin')->prefix('admin')->group(function(){
        Route::get('/', [PetugasController::class, 'homeAdmin']);
        Route::resource('petugas', PetugasController::class);
    });


//masyarakat
Route::get('/dashboard', [MasyarakatController::class, 'dashboard']);

//admin
Route::get('/pengaduan', [PetugasController::class, 'pengaduanView']);
Route::get('/laporan', [PetugasController::class, 'laporanView']);
Route::get('/adminHome', [PetugasController::class, 'homeAdmin']);





