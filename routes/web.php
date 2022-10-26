<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;

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


Route::group(['/'], function(){
    // Home
    Route::get('/', function () {
        return redirect('product');
    });

    //Search Product
    Route::get('search', [ProductController::class,'search']);

    Route::prefix('product')->group(function () {
        //Product Category
        Route::get('/category/{cat}', [CategoryController::class, 'show']);

        Route::get('/manage/', [ProductController::class, 'manage']);
    });

    //Product Resource
    Route::resource('product', ProductController::class);
});
