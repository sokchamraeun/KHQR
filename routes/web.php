<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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