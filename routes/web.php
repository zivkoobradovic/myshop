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


Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('product.create')->middleware('admin');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('product.store')->middleware('admin');
Route::get('/products/{product}', [App\Http\Controllers\ProductsController::class, 'show'])->name('product.show');
Route::get('/products/{product}/edit', [App\Http\Controllers\ProductsController::class, 'edit'])->name('product.edit')->middleware('admin');
Route::patch('/products/{product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('product.update')->middleware('admin');

Route::get('/users/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.index');