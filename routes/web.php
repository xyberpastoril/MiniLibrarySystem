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
    Route::post('/search', [App\Http\Controllers\HomeController::class, 'searchBooks'])->name('home.search');
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'searchBooks'])->name('home.search');

    Route::get('/result/transactions/monthly', [App\Http\Controllers\HomeController::class, 'getTransactionsByMonth'])
        ->name('home.getTransactionsByMonth');

    // Route group for Admin Pages
    Route::group([], function(){

    });


    // Books
    Route::delete('/books/destroyWithRedirect/{book}',[App\Http\Controllers\BookController::class,'destroyWithRedirect'])
        ->name('books.destroyWithRedirect');
    Route::resource('/books', App\Http\Controllers\BookController::class);
    Route::get('/result/books/search/', [App\Http\Controllers\HomeController::class, 'search']);

    // Users
    Route::delete('/users/destroyWithRedirect/{user}',[App\Http\Controllers\UserController::class,'destroyWithRedirect'])
        ->name('users.destroyWithRedirect');
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::post('/users/verify/{user}', [App\Http\Controllers\UserController::class, 'verify'])
        ->name('users.verify');
    Route::get('/result/users/search/', [App\Http\Controllers\UserController::class, 'search']);

    // Transactions Pages
    Route::get('/transactions/waiting_for_approval',[App\Http\Controllers\TransactionController::class,'waiting_for_approval'])
        ->name('transactions.waiting_for_approval');
    Route::get('/transactions/in_progress',[App\Http\Controllers\TransactionController::class,'in_progress'])
        ->name('transactions.in_progress');
    Route::get('/transactions/history',[App\Http\Controllers\TransactionController::class,'history'])
        ->name('transactions.history');

    // Transactions Actions
    Route::post('/transactions/request/{book}', [App\Http\Controllers\TransactionController::class, 'request'])
        ->name('transactions.request');
    Route::delete('/transactions/{transaction}/cancel', [App\Http\Controllers\TransactionController::class, 'cancel'])
        ->name('transactions.cancel');
    Route::put('/transactions/{transaction}/approve', [App\Http\Controllers\TransactionController::class, 'approve'])
        ->name('transactions.approve');
    Route::put('/transactions/{transaction}/claim', [App\Http\Controllers\TransactionController::class, 'claim'])
        ->name('transactions.claim');
    Route::put('/transactions/{transaction}/return', [App\Http\Controllers\TransactionController::class, 'return'])
        ->name('transactions.return');

    // Transactions JSON
    Route::get('/result/transactions/search/', [App\Http\Controllers\TransactionController::class, 'search']);

    // Penalty Actions
    Route::post('/penalty/{penalty}/pay', [App\Http\Controllers\PenaltyController::class, 'pay'])
        ->name('penalty.pay');

    Route::get('/account/overview',[App\Http\Controllers\AccountController::class,'overview'])
        ->name('account.overview');
    Route::get('/account/settings',[App\Http\Controllers\AccountController::class,'settings'])
        ->name('account.settings');

    Route::post('/account/updateEmail', [App\Http\Controllers\AccountController::class, 'updateEmail'])
        ->name('account.updateEmail');
    Route::post('/account/updatePassword', [App\Http\Controllers\AccountController::class, 'updatePassword'])
        ->name('account.updatePassword');
    Route::post('/account/updateBasicInfo', [App\Http\Controllers\AccountController::class, 'updateBasicInfo'])
        ->name('account.updateBasicInfo');
});
