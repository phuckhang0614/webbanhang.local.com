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

// Run php artisan optimize

// Begin Route homepage
Route::get('/', [App\Http\Controllers\FrontEnd\HomeController::class, 'index']);
Route::get('/index.html', [App\Http\Controllers\FrontEnd\HomeController::class, 'index']);
Route::get('/home.html', [App\Http\Controllers\FrontEnd\HomeController::class, 'index']);

Route::get('/trang-chu.html', [App\Http\Controllers\FrontEnd\HomeController::class, 'index'])->name('ROUTE_HOME_PAGE');
// End Route homepage

//