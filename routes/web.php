<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;



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
        Route::get('/manage/{query}', [ProductController::class, 'manageWithQuery']);
    });

    //Product Resource
    Route::resource('product', ProductController::class);

    //Cart Resource
    Route::post('history', [CartController::class, 'purchase'])->name('history');
    Route::resource('cart', CartController::class);
});
