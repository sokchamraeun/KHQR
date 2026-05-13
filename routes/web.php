<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('payment')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/generate', [PaymentController::class, 'generate'])->name('payment.generate');
    Route::get('/success/{id}', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/verify', [PaymentController::class, 'verify'])->name('payment.verify');
    Route::post('/verify', [PaymentController::class, 'verifyCheck'])->name('payment.verify.check');
});

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::post('/cart/add/{product}', [ProductsController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ProductsController::class, 'cart'])->name('cart.index');
Route::post('/cart/remove/{id}', [ProductsController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
