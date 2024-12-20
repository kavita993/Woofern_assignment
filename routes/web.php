<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CartController;


use App\Http\Controllers\ReviewController;

use App\Http\Controllers\LocationController;

// web.php
Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/check-availability', [ProductController::class, 'checkAvailability']);
Route::post('/check-pincode', [DeliveryController::class, 'checkPincode']);

Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('review.store');


Route::post('/location', [LocationController::class, 'checkPincode'])->name('location.check');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
