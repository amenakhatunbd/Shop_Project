<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;


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


Route::resource('customers', CustomerController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('categorys', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('saless', SalesController::class);

Route::post('purchase_update/{id}', [PurchaseController::class, 'update'])->name('purchase_update');

Auth::routes();





Route::group(['middleware'=>'auth'], function(){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});