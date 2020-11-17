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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');


Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('product.create')->middleware('admin');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('product.store')->middleware('admin');
Route::get('/products/{product}', [App\Http\Controllers\ProductsController::class, 'show'])->name('product.show');
Route::get('/products/{product}/edit', [App\Http\Controllers\ProductsController::class, 'edit'])->name('product.edit')->middleware('admin');
Route::patch('/products/{product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('product.update')->middleware('admin');
Route::delete('/products/{product}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('product.delete')->middleware('admin');

Route::get('categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('category.create')->middleware('admin');
Route::post('/categories', [App\Http\Controllers\CategoriesController::class, 'store'])->name('category.store')->middleware('admin');
Route::get('/categories/{category}/edit', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('category.edit')->middleware('admin');
Route::patch('/categories/{category}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('category.update')->middleware('admin');


Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('show.cart');
Route::get('/cart-add', [App\Http\Controllers\CartController::class, 'store'])->name('store.cart');
