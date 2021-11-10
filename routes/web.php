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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route group that requires authentication
Route::group([], function(){

    // Route group for Admin Pages
    Route::group([], function(){

        // Dashboard
        Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name("admin.dashboard");

    });

    Route::resource('/books', App\Http\Controllers\BookController::class);
    Route::resource('/users', App\Http\Controllers\UserController::class);

});