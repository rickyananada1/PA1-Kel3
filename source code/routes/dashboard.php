<?php
/**
 * A Route file for dashboard
 */

use App\Http\Controllers\DataSampahController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function (){

    /** PROFILE STUFFS */
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('profile/entity', [ProfileController::class, 'entityUpdate'])->name('entity.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['dashboard_admin_only'])->prefix('man')->group(function (){
        Route::prefix('nasabah')->group(function (){
            Route::get('/', [\App\Http\Controllers\AdminManageNasabah::class, 'ListNasabah'])->name('man.nasabah.list');
            Route::get('/details/{id}', [\App\Http\Controllers\AdminManageNasabah::class, 'DetailNasabah'])->name('man.nasabah.detail');
            Route::get('/activate/{id}', [\App\Http\Controllers\AdminManageNasabah::class, 'ActivateNasabah'])->name('man.nasabah.activate');
        });

        Route::prefix('unit')->group(function (){
            Route::get('/', [\App\Http\Controllers\AdminManageUnit::class, 'ListUnit'])->name('man.unit.list');
            Route::get('/details/{id}', [\App\Http\Controllers\AdminManageUnit::class, 'DetailUnit'])->name('man.unit.detail');
            Route::get('/activate/{id}', [\App\Http\Controllers\AdminManageUnit::class, 'ActivateUnit'])->name('man.unit.activate');
        });

        Route::prefix('homepage')->group(function (){
            Route::get('/', [\App\Http\Controllers\HomepageController::class, 'ShowEditHomepage'])->name('admin.homepage.update.form'); // ini untuk formulir
            Route::post('/push/{section}', [\App\Http\Controllers\HomepageController::class, 'pushHomepageUpdate'])->name('admin.homepage.update.push'); // ini untuk ngepush update
        });


    });

    Route::middleware(['check_activated_account'])->group(function (){

        Route::get('/', [\App\Http\Controllers\DashboardController::class, 'MainPage'])->name('dashboard');

        // nasabah only pages URL endpoints
        Route::middleware(['dashboard_nasabah_only'])->group(function (){
            /** pages */
            Route::get('saldo', [\App\Http\Controllers\DataSaldoController::class, 'ShowSaldoInfo'])->name('nasabah.show.saldo');
        });


        Route::middleware(['dashboard_unit_only'])->group(function (){
            /** pages */
            // sampah
            Route::prefix('sampah')->group(function (){
                Route::get('/', [DataSampahController::class, 'ShowDataSampah'])->name('sampah.home');
                Route::get('tambah', [DataSampahController::class, 'SubmitDataSampah'])->name('sampah.tambah');
                Route::get('edit/{id}', [DataSampahController::class, 'EditDataSampah'])->name('sampah.edit');
                Route::get('detail/{id}', [DataSampahController::class, 'showDetailDataSampah'])->name('sampah.detail');

                Route::prefix('kategori')->group(function (){
                    // kategori sampah
                    Route::get('/', [DataSampahController::class, 'ShowKategoriSampah'])->name('sampah.kategori.home');
                    Route::get('/tambah', [DataSampahController::class, 'TambahKategoriSampah'])->name('sampah.kategori.tambah');
                    Route::get('/edit/{id}', [DataSampahController::class, 'EditKategoriSampah'])->name('sampah.kategori.edit');
                });
            });


            // nasabah : saldo
            Route::prefix('nasabah')->group(function (){
                Route::get('/', [\App\Http\Controllers\DataSaldoController::class, 'ShowNasabahLists'])->name('nasabah.list');
                Route::get('detail/{id}', [\App\Http\Controllers\DataSaldoController::class, 'ShowNasabahDetail'])->name('nasabah.detail');
            });

            Route::prefix('saldo')->group(function (){
                Route::get('deposit/{id}', [\App\Http\Controllers\DataSaldoController::class, 'ShowDepositForm'])->name('nasabah.saldo.deposit'); // either deposit or tarik
                Route::get('tarik/{id}', [\App\Http\Controllers\DataSaldoController::class, 'ShowTarikForm'])->name('nasabah.saldo.tarik'); // either deposit or tarik
            });

            // cerita
            Route::prefix('cerita')->group(function (){
                Route::get('/', [\App\Http\Controllers\CeritaController::class, 'listCerita'])->name('cerita.list');
                Route::get('/write', [\App\Http\Controllers\CeritaController::class, 'NewCeritaForm'])->name('cerita.write');
                Route::get('/edit/{id}', [\App\Http\Controllers\CeritaController::class, 'UpdateCeritaForm'])->name('cerita.edit');

                Route::prefix('kategori')->group(function (){
                    // kategori cerita
                    Route::get('/', [\App\Http\Controllers\CeritaController::class, 'listCategory'])->name('cerita.kategori.home');
                    Route::get('/tambah', [\App\Http\Controllers\CeritaController::class, 'NewCategoryForm'])->name('cerita.kategori.tambah');
                    Route::get('/edit/{id}', [\App\Http\Controllers\CeritaController::class, 'EditCategoryForm'])->name('cerita.kategori.edit');
                });
            });

            /** actions */
            // sampah
            Route::prefix('action')->group(function (){

                Route::prefix('sampah')->group(function (){

                    Route::post('push', [DataSampahController::class, 'pushDataSampah'])->name('sampah.action.push');
                    Route::post('update/{id}', [DataSampahController::class, 'updateDataSampah'])->name('sampah.action.update');
                    Route::get('delete/{id}', [DataSampahController::class, 'deleteDataSampah'])->name('sampah.action.delete');

                    Route::prefix('kategori')->group(function (){
                        // kategori samopah
                        Route::post('push', [DataSampahController::class, 'pushKategoriSampah'])->name('sampah.kategori.action.push');
                        Route::post('update/{id}', [DataSampahController::class, 'updateKategoriSampah'])->name('sampah.kategori.action.update');
                        Route::get('delete/{id}', [DataSampahController::class, 'deleteKategoriSampah'])->name('sampah.kategori.action.delete');
                    });
                });

                Route::prefix('cerita')->group(function (){

                    // cerita
                    Route::post('ush', [\App\Http\Controllers\CeritaController::class, 'PushCerita'])->name('cerita.action.push');
                    Route::post('update/{id}', [\App\Http\Controllers\CeritaController::class, 'updateCerita'])->name('cerita.action.update');
                    Route::get('destroy/{id}', [\App\Http\Controllers\CeritaController::class, 'DestroyCerita'])->name('cerita.action.destroy');


                    Route::prefix('kategori')->group(function (){
                        // kategori cerita
                        Route::post('push', [\App\Http\Controllers\CeritaController::class, 'PushCategory'])->name('cerita.kategori.action.push');
                        Route::post('update/{id}', [\App\Http\Controllers\CeritaController::class, 'UpdateCategory'])->name('cerita.kategori.action.update');
                        Route::get('destroy/{id}', [\App\Http\Controllers\CeritaController::class, 'DestroyCategory'])->name('cerita.kategori.action.destroy');
                    });
                });

            });

            // saldo
            Route::post('saldo/deposit/{id}', [\App\Http\Controllers\DataSaldoController::class, 'DoDeposit'])->name('nasabah.action.saldo.deposit'); // either deposit or tarik
            Route::post('saldo/tarik/{id}', [\App\Http\Controllers\DataSaldoController::class, 'DoTarik'])->name('nasabah.action.saldo.tarik'); // either deposit or tarik
        });

    });
});
