<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


// Route group that requires authentication
Route::middleware(['auth'])->group(function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route group for Admin Pages
    Route::group([], function(){

    });

    Route::resource('/books', App\Http\Controllers\BookController::class);
    Route::get('/result/books/search/', [App\Http\Controllers\BookController::class, 'search']);

    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::get('/result/users/search/', [App\Http\Controllers\UserController::class, 'search']);

    Route::get('/transactions/waiting_for_approval',[App\Http\Controllers\TransactionController::class,'waiting_for_approval'])->name('transactions.waiting_for_approval');
    Route::get('/transactions/in_progress',[App\Http\Controllers\TransactionController::class,'in_progress'])->name('transactions.in_progress');
    Route::get('/transactions/history',[App\Http\Controllers\TransactionController::class,'history'])->name('transactions.history');
    Route::get('/result/transactions/search/', [App\Http\Controllers\TransactionController::class, 'search']);

    Route::get('/account/overview',[App\Http\Controllers\AccountController::class,'overview'])->name('account.overview');
    Route::get('/account/settings',[App\Http\Controllers\AccountController::class,'settings'])->name('account.settings');
    Route::post('/account/updateEmail', [App\Http\Controllers\AccountController::class, 'updateEmail'])->name('account.updateEmail');
    Route::post('/account/updatePassword', [App\Http\Controllers\AccountController::class, 'updatePassword'])->name('account.updatePassword');
});
