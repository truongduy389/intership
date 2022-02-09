<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SPController;
use App\Http\Controllers\ImageController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('image')->group(function(){
    Route::get('/',[ImageController::class,'index']);
    Route::post('/store',[ImageController::class,'store']);
    Route::get('/show/{id}',[ImageController::class,'show']);
    Route::put('/update/{id}',[ImageController::class,'update']);
    //************************************
    // Không hỗ trợ route::delete -> dùng post
    Route::post('/delete/{id}', [ImageController::class,'delete']);
    //************************************
    
});