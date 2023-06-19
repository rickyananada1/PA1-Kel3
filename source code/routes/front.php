<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class, 'ShowHomepage'])->name('homepage');
Route::get('/units', [\App\Http\Controllers\HomepageController::class, 'showBankSampahInfos'])->name('publicunitlist');

Route::prefix('cerita')->group(function (){

    Route::prefix('by')->group(function (){

        Route::get('author', [\App\Http\Controllers\CeritaController::class, 'HomepageListCeritaPerAuthor'])->name('cerita.by.author');

        Route::get('category', [\App\Http\Controllers\CeritaController::class, 'HomepageListCeritaPerCategory'])->name('cerita.by.category');

    });

    Route::get('/', [\App\Http\Controllers\CeritaController::class, 'HomepageListCerita'])->name('cerita.all');
    Route::get('/view/{id}', [\App\Http\Controllers\CeritaController::class, 'showCerita'])->name('cerita.view');

});
