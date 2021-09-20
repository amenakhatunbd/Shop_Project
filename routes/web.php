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
use App\Http\Controllers\SampleController;

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




Route::resource('samples', SampleController::class);
Route::post('samples_update/{id}', [SampleController::class, 'update'])->name('samples_update');




Route::resource('products', ProductController::class);
Route::post('product_update/{id}', [ProductController::class, 'update'])->name('product_update');
Route::post('/checkProduct', [ProductController::class, 'checkProduct'])->name('checkProduct');





// Route::post('/checkemail', [CustomerController::class, 'checkEmail']);

Route::post('/checkemail', [CustomerController::class, 'checkEmail'])->name('checkemail');
Route::post('/checkphone', [CustomerController::class, 'checkphone'])->name('checkphone');


Route::post('/checkemailsupplir', [SupplierController::class, 'checkemailsupplir'])->name('checkemailsupplir');
Route::post('/supplirname', [SupplierController::class, 'supplirname'])->name('supplirname');


Route::post('/checkName', [CustomerController::class, 'checkName'])->name('checkName');


Route::post('/category', [CategoryController::class, 'category'])->name('category');



Route::post('/checksample', [SampleController::class, 'checksample'])->name('checksample');


Auth::routes();





Route::group(['middleware'=>'auth'], function(){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});







