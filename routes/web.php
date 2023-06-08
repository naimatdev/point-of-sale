<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('photos', PhotoController::class);
Route::middleware('auth')->group(function () {
Route::resource('/orders', OrderController::class); //orders.index
Route::resource('/products', ProductController::class); //products.index
Route::resource('/suppliers', SupplierController::class); //suppliers.index
Route::resource('/users', UserController::class); //users.index
Route::resource('/companies', CompanyController::class); //companies.index
Route::resource('/transactions', TranactionController::class); //transactions.index
Route::get('/barcodes', [ProductController::class, 'getProductBarcodes'])->name('products.barcode'); //product.barcode.index
});