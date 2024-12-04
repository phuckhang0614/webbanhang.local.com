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

// Begin Route admin page
Route::get('/admin.html', [App\Http\Controllers\BackEnd\AdminController::class, 'index'])->name('ROUTE_ADMIN_PAGE');
//end Route admin page

// Begin Route dashboard page
Route::get('/dashboard.html', [App\Http\Controllers\BackEnd\AdminController::class, 'show_dashboard'])->name('ROUTE_ADMIN_SHOW_DASHBOARD_PAGE');
Route::post('/admin-dashboard.html', [App\Http\Controllers\BackEnd\AdminController::class, 'dashboard'])->name('ROUTE_ADMIN_POST_DASHBOARD_PAGE');
// End Route dashboard page
// Begin Route logout
Route::get('/logout.html', [App\Http\Controllers\BackEnd\AdminController::class, 'logout'])->name('ROUTE_ADMIN_LOGOUT_DASHBOARD_PAGE');
// End Route logout

// Begin Route Caterogy Products
Route::get('/add-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'add'])->name('ROUTE_ADD_CATEGORY_PRODUCTS_DASHBOARD_PAGE');
Route::get('/all-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'index'])->name('ROUTE_ALL_CATEGORY_PRODUCTS_DASHBOARD_PAGE');
// End Route Caterogy Products

// Begin Save Category Products
Route::post('/save-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'save'])->name('ROUTE_SAVE_CATEGORY_PRODUCTS_DASHBOARD_PAGE');
// End Save Category Products

// Begin STATUS Category Products
Route::get('/unactive-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'inactive'])->name('ROUTE_UNACTIVE_CATEGORY_PRODUCTS');
Route::get('/active-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'active'])->name('ROUTE_ACTIVE_CATEGORY_PRODUCTS');
// End STATUS Category Products

// Begin Update cate product
Route::get('/update-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'update'])->name('ROUTE_UPDATE_CATEGORY_PRODUCTS_DASHBOARD_PAGE');
Route::post('/update-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'update_category'])->name('ROUTE_UPDATE_PRODUCTS');
// End Update cate product

// Begin Deletecate product
Route::get('/delete-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'delete'])->name('ROUTE_DELETE_CATEGORY_PRODUCTS_DASHBOARD_PAGE');
// End Delete cate product