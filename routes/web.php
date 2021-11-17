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
    Route::get('/result/books/search/{search}', [App\Http\Controllers\BookController::class, 'selectSearch']);


    Route::resource('/users', App\Http\Controllers\UserController::class);

    Route::get('/transactions/waiting_for_approval',[App\Http\Controllers\TransactionController::class,'waiting_for_approval'])->name('admin.transactions.waiting_for_approval');
    Route::get('/transactions/in_progress',[App\Http\Controllers\TransactionController::class,'in_progress'])->name('admin.transactions.in_progress');
    Route::get('/transactions/history',[App\Http\Controllers\TransactionController::class,'history'])->name('admin.transactions.history');
    
    Route::get('/account/overview',[App\Http\Controllers\AccountController::class,'overview'])->name('account.overview');
    Route::get('/account/notifications',[App\Http\Controllers\AccountController::class,'notifications'])->name('account.notifications');
    Route::get('/account/settings',[App\Http\Controllers\AccountController::class,'settings'])->name('account.settings');

});