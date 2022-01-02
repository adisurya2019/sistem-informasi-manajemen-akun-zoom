<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunZoomController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestPinjamController;
use App\Http\Middleware\CekLevel;
use App\Models\AkunZoomModel;
use Illuminate\Routing\RouteGroup;

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

// ROUTE UNTUK ADMIN
Route::group(['middleware'=> ['auth', 'ceklevel:Admin']], function (){
    //CRUD akun zoom
    Route::get('/akun-zoom', [AkunZoomController::class, 'index']);
    Route::get('akun-zoom/tambah', [AkunZoomController::class, 'create']);
    Route::post('akun-zoom', [AkunZoomController::class, 'store']);
    Route::get('akun-zoom/edit/{id_zoom}', [AkunZoomController::class, 'edit']);
    Route::patch('akun-zoom/{id_zoom}', [AkunZoomController::class, 'update']);
    Route::delete('/akun-zoom/{id_zoom}', [AkunZoomController::class, 'destroy']);

    //update status request akun zoom yang dibuat oleh user
    Route::get('/request-pinjam/edit/{id_peminjaman}', [RequestPinjamController::class, 'edit']);
    Route::patch('/request-pinjam/{id_peminjaman}', [RequestPinjamController::class, 'update']);

    //melihat history peminjaman dan restore data
    Route::get('/request-pinjam/history', [RequestPinjamController::class, 'history']);
    Route::get('/request-pinjam/history/{id_peminjaman?}', [RequestPinjamController::class, 'restore']);
});

// ROUTE UNTUK MAHASISWA
Route::group(['middleware'=> ['auth', 'ceklevel:User']], function (){
    //Menambah request peminjaman akun zoom
    Route::get('/request-pinjam/tambah', [RequestPinjamController::class, 'create']);
    Route::post('/request-pinjam', [RequestPinjamController::class, 'store']);

    //mengembalikan akun zoom
    Route::get('/pengembalian/edit/{id_peminjaman}', [RequestPinjamController::class, 'pengembalian']);
    Route::patch('/pengembalian/{id_peminjaman}', [RequestPinjamController::class, 'pengembalian_update']);
    Route::delete('/request-pinjam/finish/{id_peminjaman}', [RequestPinjamController::class, 'soft_destroy']);
});

//ROUTE ADMIN DAN MAHASISWA
Route::group(['middleware'=>['auth', 'ceklevel:Admin,User']], function (){
    //melihat dashboard
    Route::get('/dashboard', [LevelController::class, 'dashboard']);

    //melihat list request yang telah dibuat
    Route::get('/request-pinjam', [RequestPinjamController::class, 'index']);

    //melihat jadwal request yang telah di approved
    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/jadwal/detail/{id_peminjaman}', [JadwalController::class, 'edit']);

    //menghapus request yang belum di approved
    Route::delete('/request-pinjam/{id_peminjaman}', [RequestPinjamController::class, 'destroy']);
});

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//REGISTER
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'add']);

//LOGOUT
Route::post('/logout', [LoginController::class, 'logout']);