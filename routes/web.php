<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AprioriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UmkmController;
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

Route::get('/', [AuthController::class, 'landingPage']);

// authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/regis', [AuthController::class, 'regis']);
Route::post('/login', [AuthController::class, 'postLogin']);
Route::post('/regis', [AuthController::class, 'postRegis']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'Roles:admin']], function () {
    Route::get('/dashboard-admin', [AdminController::class, 'dashboard']);

    Route::get('/admin/data-pengguna', [AdminController::class, 'pengguna']);
    Route::get('/admin/data-pengguna/show/{id}', [AdminController::class, 'showPengguna']);
    Route::get('/admin/data-pengguna/edit/{id}', [AdminController::class, 'editPengguna']);
    Route::put('/admin/data-pengguna/update/{id}', [AdminController::class, 'updatePengguna']);
    Route::delete('/admin/data-pengguna/{id}', [AdminController::class, 'destroyPengguna']);

    Route::get('/admin/data-produk', [AdminController::class, 'produk']);
    Route::get('/admin/data-penjualan', [AdminController::class, 'penjualan']);
});

Route::group(['middleware' => ['auth', 'Roles:umkm']], function () {
    Route::get('/dashboard-umkm', [UmkmController::class, 'dashboard']);

    Route::get('/umkm/data-produk', [ProdukController::class, 'index']);
    Route::post('/umkm/data-produk', [ProdukController::class, 'store']);
    Route::get('/umkm/data-produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::post('/umkm/data-produk/update/{id}', [ProdukController::class, 'update']);
    Route::delete('/umkm/data-produk/{id}', [ProdukController::class, 'destroy']);
    Route::post('/data-produk/importExcel', [ProdukController::class, 'importExcel'])->name('produk.importExcel');

    Route::get('/umkm/data-penjualan', [PenjualanController::class, 'index']);
    Route::post('/umkm/data-penjualan', [PenjualanController::class, 'store']);
    Route::get('/umkm/data-penjualan/edit/{id}', [PenjualanController::class, 'edit']);
    Route::post('/umkm/data-penjualan/update/{id}', [PenjualanController::class, 'update']);
    Route::delete('/umkm/data-penjualan/{id}', [PenjualanController::class, 'destroy']);
    Route::post('/data-penjualan/importExcel', [PenjualanController::class, 'importExcel'])->name('penjualan.importExcel');

    // many store
    Route::get('/umkm/data-penjualan/pos', [PenjualanController::class, 'pos']);
    Route::post('/umkm/data-penjualan/pos', [PenjualanController::class, 'storeMany']);


    Route::get('/umkm/apriori/setup', [AprioriController::class, 'setupPerhitunganApriori']);
});
