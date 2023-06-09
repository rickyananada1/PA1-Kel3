<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/front.php';

// dashboard
require __DIR__.'/dashboard.php';

// auth, breeze generated
require __DIR__.'/auth.php';

// misc
Route::get('/notactive', function (){
    return view('.misc.accountnotactive');
})->name('misc.account_not_activated');
