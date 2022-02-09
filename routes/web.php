<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CreateProductController;
use App\Http\Controllers\MyStoreController;
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

Route::get('/', [MyStoreController::class, 'index'])->name('mystore');
Route::get('/index', [ProductController::class, 'index'])->name('san-pham');
Route::get('/categories', [ProductController::class, 'categories'])->name('categories');
Route::get('/create', [ProductController::class, 'create'])->name('them-san-pham');
Route::post('/store', [ProductController::class, 'store'])->name('tao-san-pham');
Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('sua-san-pham');
Route::put('/update/{id}', [ProductController::class, 'update'])->name('thay-doi-san-pham');
Route::post('/updatePro', [ProductController::class, 'updatePro'])->name('updatePro');
Route::get('/pushSp/{id}', [ProductController::class, 'postSp'])->name('dangban');
Route::post('/pushSp', [MyStoreController::class, 'postWp'])->name('postSp');
Route::get('/them', [ProductController::class, 'creates']);


//show product edit 

Route::get('/mystore/details/{id}', [MyStoreController::class, 'details'])->name('details');
Route::get('/productdetail/{id}', [ProductController::class, 'productdetail'])->name('chi-tiet-san-pham');
Route::get('/media', [ProductController::class, 'media'])->name('media');
//setting 
Route::get('/setting', [ProductController::class, 'setting'])->name('setting');
