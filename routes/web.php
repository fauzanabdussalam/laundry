<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

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
    return redirect('transaksi');
});

Route::group(['prefix' => 'cabang'], function () 
{
    Route::get('/', [AdminController::class, 'cabang'])->name('cabang');
    Route::post('data', [AdminController::class, 'getDataCabang'])->name('cabang.data');
    Route::post('save', [AdminController::class, 'saveCabang'])->name('cabang.save');
    Route::post('delete', [AdminController::class, 'hapusCabang'])->name('cabang.delete');
});

Route::group(['prefix' => 'layanan'], function () 
{
    Route::get('/', [AdminController::class, 'layanan'])->name('layanan');
    Route::post('data', [AdminController::class, 'getDataLayanan'])->name('layanan.data');
    Route::post('save', [AdminController::class, 'saveLayanan'])->name('layanan.save');
    Route::post('delete', [AdminController::class, 'hapusLayanan'])->name('layanan.delete');
});

Route::group(['prefix' => 'pengharum'], function () 
{
    Route::get('/', [AdminController::class, 'pengharum'])->name('pengharum');
    Route::post('data', [AdminController::class, 'getDataPengharum'])->name('pengharum.data');
    Route::post('save', [AdminController::class, 'savePengharum'])->name('pengharum.save');
    Route::post('delete', [AdminController::class, 'hapusPengharum'])->name('pengharum.delete');
});

Route::group(['prefix' => 'pegawai'], function () 
{
    Route::get('/', [AdminController::class, 'pegawai'])->name('pegawai');
    Route::post('data', [AdminController::class, 'getDataPegawai'])->name('pegawai.data');
    Route::post('save', [AdminController::class, 'savePegawai'])->name('pegawai.save');
    Route::post('delete', [AdminController::class, 'hapusPegawai'])->name('pegawai.delete');
    Route::post('list', [AdminController::class, 'getListPegawaiByCabang'])->name('pegawai.list');
});

Route::group(['prefix' => 'pelanggan'], function () 
{
    Route::get('/', [AdminController::class, 'pelanggan'])->name('pelanggan');
    Route::post('data', [AdminController::class, 'getDataPelanggan'])->name('pelanggan.data');
});

Route::group(['prefix' => 'transaksi'], function () 
{
    Route::get('/', [AdminController::class, 'transaksi'])->name('transaksi');
    Route::get('input', [AdminController::class, 'inputTransaksi'])->name('transaksi.input');
    Route::post('save', [AdminController::class, 'saveTransaksi'])->name('transaksi.save');
    Route::post('detail', [AdminController::class, 'transaksiDetail'])->name('transaksi.detail');
    Route::post('delete', [AdminController::class, 'hapusTransaksi'])->name('transaksi.delete');
});

Route::group(['prefix' => 'cart'], function () 
{
    Route::post('/', [CartController::class, 'cart'])->name('cart');
    Route::post('clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('add', [CartController::class, 'add'])->name('cart.add');
    Route::post('remove', [CartController::class, 'remove'])->name('cart.remove');
});

require __DIR__.'/auth.php';
