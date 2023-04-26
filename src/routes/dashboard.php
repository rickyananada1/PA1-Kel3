<?php
/**
 * A Route file for dashboard
 */

use App\Http\Controllers\DataSampahController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function (){
    // everyone can access!
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'MainPage'])->name('dashboard');

    // Showing Profil!
    Route::get('/profil');

    // unit only pages URL endpoints

    // nasabah only pages URL endpoints
    Route::middleware(['dashboard_nasabah_only'])->group(function (){
        /** pages */
        Route::get('/dashboard/saldo');
    });

    Route::middleware(['dashboard_unit_only'])->group(function (){
        /** pages */
        // sampah
        Route::get('/dashboard/sampah/', [DataSampahController::class, 'ShowDataSampah'])->name('sampah.home');
        Route::get('/dashboard/sampah/tambah', [DataSampahController::class, 'SubmitDataSampah'])->name('sampah.tambah');
        Route::get('/dashboard/sampah/edit/{id}', [DataSampahController::class, 'EditDataSampah']);

        // kategori sampah
        Route::get('/dashboard/sampah/kategori/', [DataSampahController::class, 'ShowKategoriSampah'])->name('sampah.kategori.home');
        Route::get('/dashboard/sampah/kategori/tambah', [DataSampahController::class, 'TambahKategoriSampah'])->name('sampah.kategori.tambah');
        Route::get('/dashboard/sampah/kategori/edit/{id}', [DataSampahController::class, 'EditKategoriSampah']);
        Route::get('/dashboard/sampah/detail/{id}', [DataSampahController::class, 'showDetailDataSampah']);

        // nasabah : saldo
        Route::get('/dashboard/nasabah/', [\App\Http\Controllers\DataSaldoController::class, 'ShowNasabahLists'])->name('nasabah.list');
        Route::get('/dashboard/nasabah/detail/{id}', [\App\Http\Controllers\DataSaldoController::class, 'ShowNasabahDetail']);
        Route::get('/dashboard/saldo/deposit/{id}', [\App\Http\Controllers\DataSaldoController::class, 'ShowDepositForm']); // either deposit or tarik
        Route::get('/dashboard/saldo/tarik/{id}', [\App\Http\Controllers\DataSaldoController::class, 'ShowTarikForm']); // either deposit or tarik

        // blog
        Route::get('/dashboard/blog/list');
        Route::get('/dashboard/blog/create', [\App\Http\Controllers\BlogController::class, 'NewBlogForm']);

        /** actions */
        // sampah
        Route::post('/dashboard/action/sampah/push', [DataSampahController::class, 'pushDataSampah'])->name('sampah.action.push');
        Route::post('/dashboard/action/sampah/update/{id}', [DataSampahController::class, 'updateDataSampah'])->name('sampah.action.update');
        Route::get('/dashboard/action/sampah/delete/{id}', [DataSampahController::class, 'deleteDataSampah'])->name('sampah.action.delete');

        // kategori
        Route::post('/dashboard/action/sampah/kategori/push', [DataSampahController::class, 'pushKategoriSampah'])->name('sampah.kategori.action.push');
        Route::post('/dashboard/action/sampah/kategori/update/{id}', [DataSampahController::class, 'updateKategoriSampah'])->name('sampah.kategori.action.update');
        Route::get('/dashboard/action/sampah/kategori/delete/{id}', [DataSampahController::class, 'deleteKategoriSampah'])->name('sampah.kategori.action.delete');

        // saldo
        Route::post('/dashboard/saldo/deposit/{id}', [\App\Http\Controllers\DataSaldoController::class, 'DoDeposit']); // either deposit or tarik
        Route::post('/dashboard/saldo/tarik/{id}', [\App\Http\Controllers\DataSaldoController::class, 'DoTarik']); // either deposit or tarik
    });

});
