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

// Begin Admin page
	// Begin Route admin page
	Route::get('/admin.html', [App\Http\Controllers\BackEnd\AdminController::class, 'admin'])->name('ROUTE_ADMIN_PAGE');
	//end Route admin page

	// Begin Route dashboard page
	Route::get('/dashboard.html', [App\Http\Controllers\BackEnd\AdminController::class, 'show_dashboard'])->name('ROUTE_ADMIN_SHOW_DASHBOARD_PAGE');
	Route::post('/admin-dashboard.html', [App\Http\Controllers\BackEnd\AdminController::class, 'dashboard'])->name('ROUTE_ADMIN_POST_DASHBOARD_PAGE');
	// End Route dashboard page
	// Begin Route logout
	Route::get('/logout.html', [App\Http\Controllers\BackEnd\AdminController::class, 'logout'])->name('ROUTE_ADMIN_LOGOUT_DASHBOARD_PAGE');
	// End Route logout
// End Admin page	

// Begin CatePro
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
	Route::get('/edit-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'edit'])->name('ROUTE_EDIT_CATEGORY_PRODUCTS_DASHBOARD_PAGE');
	Route::post('/update-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'update_category'])->name('ROUTE_UPDATE_PRODUCTS');
	// End Update cate product

	// Begin Deletete product
	Route::get('/delete-category-products.html', [App\Http\Controllers\BackEnd\Product\CategoryProductsController::class, 'delete'])->name('ROUTE_DELETE_CATEGORY_PRODUCTS_DASHBOARD_PAGE');
	// End Delete cate product
// End CatePro

// Begin route Brand
	// Begin add brand
	Route::get('/all-brand.html', [App\Http\Controllers\BackEnd\Product\BrandController::class, 'index_brand'])->name('ROUTE_ALL_BRAND');
		// End adđ brand

		// Begin all brand
	Route::get('/add-brand.html', [App\Http\Controllers\BackEnd\Product\BrandController::class, 'add_brand'])->name('ROUTE_ADD_BRAND');
		// End all brand 

		// Begin Save brand
	Route::post('/save-brand-products.html', [App\Http\Controllers\BackEnd\Product\BrandController::class, 'save_brand'])->name('ROUTE_SAVE_BRAND');
		// End Save brand

		// Begin STATUS brand
	Route::get('/unactive-brand-products.html', [App\Http\Controllers\BackEnd\Product\BrandController::class, 'inactive_brand'])->name('ROUTE_UNACTIVE_BRAND');
	Route::get('/active-brand-products.html', [App\Http\Controllers\BackEnd\Product\BrandController::class, 'active_brand'])->name('ROUTE_ACTIVE_BRAND');
		// End STATUS brand

		// Begin Update brand product
	Route::get('/edit-brand-products.html', [App\Http\Controllers\BackEnd\Product\BrandController::class, 'edit_brand'])->name('ROUTE_EDIT_BRAND_PRODUCTS');
	Route::post('/update-brand-products.html', [App\Http\Controllers\BackEnd\Product\BrandController::class, 'update_brand'])->name('ROUTE_UPDATE_BRAND_PRODUCTS');
		// End Update brand product

		// Begin Deletete product
	Route::get('/delete-brand-products.html', [App\Http\Controllers\BackEnd\Product\BrandController::class, 'delete_brand'])->name('ROUTE_DELETE_BRAND_PRODUCTS');
	// End Delete brand product
// End route Brand

// Begin route Products
	// Begin add products
	Route::get('/all-products.html', [App\Http\Controllers\BackEnd\Product\ProductsController::class, 'index_products'])->name('ROUTE_ALL_PRODUCTS');
		// End adđ products

		// Begin all products
	Route::get('/add-products.html', [App\Http\Controllers\BackEnd\Product\ProductsController::class, 'add_products'])->name('ROUTE_ADD_PRODUCTS');
		// End all products 

		// Begin Save products
	Route::post('/save-products.html', [App\Http\Controllers\BackEnd\Product\ProductsController::class, 'save_products'])->name('ROUTE_SAVE_PRODUCTS');
		// End Save products

	// 	// Begin STATUS products
	// Route::get('/unactive-products.html', [App\Http\Controllers\BackEnd\Product\ProductsController::class, 'inactive_products'])->name('ROUTE_UNACTIVE_PRODUCTS');
	// Route::get('/active-products.html', [App\Http\Controllers\BackEnd\Product\ProductsController::class, 'active_products'])->name('ROUTE_ACTIVE_PRODUCTS');
	// 	// End STATUS products

	// 	// Begin Update products
	// Route::get('/edit-products.html', [App\Http\Controllers\BackEnd\Product\ProductsController::class, 'edit_products'])->name('ROUTE_EDIT_PRODUCTS');
	// Route::post('/update-products.html', [App\Http\Controllers\BackEnd\Product\ProductsController::class, 'update_products'])->name('ROUTE_UPDATE_PRODUCTS');
	// 	// End Update products

	// 	// Begin Deletete products
	// Route::get('/delete-products.html', [App\Http\Controllers\BackEnd\Product\ProductsController::class, 'delete_products'])->name('ROUTE_DELETE_PRODUCTS');
	// End Delete products
// End route Products