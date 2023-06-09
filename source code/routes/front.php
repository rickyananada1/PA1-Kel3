<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class, 'showHomepage'])->name('homepage');
Route::get('/units', [\App\Http\Controllers\HomepageController::class, 'showBankSampahInfos'])->name('publicunitlist');

Route::prefix('blog')->group(function (){

    Route::prefix('by')->group(function (){

        Route::get('author', [\App\Http\Controllers\BlogController::class, 'HomepageListBlogPerAuthor'])->name('blog.by.author');

        Route::get('category', [\App\Http\Controllers\BlogController::class, 'HomepageListBlogPerCategory'])->name('blog.by.category');

    });

    Route::get('/', [\App\Http\Controllers\BlogController::class, 'HomepageListBlog'])->name('blog.all');
    Route::get('/view/{id}', [\App\Http\Controllers\BlogController::class, 'showBlog'])->name('blog.view');

});
