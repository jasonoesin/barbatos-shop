<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;



Route::group(['/'], function(){

    // Home
    Route::get('/', function () {
        return redirect('product');
    });

    Route::get('login', function () {
        return view('login');
    });
    Route::post('login', [AuthController::class, 'login']);

    Route::get('register', function () {
        return view('register');
    });
    Route::post('register', [AuthController::class, 'register']);


    Route::get('profile', function () {
        return view('profile');
    })->middleware(['isLoggedIn']);

    Route::get('logout', [AuthController::class, 'logout']);

    //Search Product
    Route::get('search', [ProductController::class,'search']);

    Route::prefix('product')->group(function () {
        //Product Category
        Route::get('/category/{cat}', [CategoryController::class, 'show']);

        Route::middleware(['isAdmin'])->group(function () {
            Route::get('/manage', [ProductController::class, 'manage'])->name('manage');
        });
    });

    //Product Resource

    // MIDDLEWARE OF MANAGE PRODUCT, ADD AND EDIT IS IN CONSTRUCTOR of ProductController
    // __construct()
    Route::resource('product', ProductController::class);

    //Cart Resource
    Route::middleware(['isCustomer'])->group(function () {
        Route::get('history', [CartController::class, 'history'])->name('history');
        Route::post('history', [CartController::class, 'purchase'])->name('history');
        Route::resource('cart', CartController::class);
    });
});
