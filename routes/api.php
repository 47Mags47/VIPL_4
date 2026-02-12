<?php

use Illuminate\Support\Facades\Route;

Route::post('/sessions',                    [\App\Http\Controllers\SessionController::class, 'store'])->name('session.store');

Route::delete('/sessions/destroy',           [\App\Http\Controllers\SessionController::class, 'destroy'])->name('session.destroy');

Route::get('/sessions/user-divisions',       [\App\Http\Controllers\SessionUserDivisionController::class, 'index'])->name('session.user-division.index');
Route::post('/sessions/user-divisions',      [\App\Http\Controllers\SessionUserDivisionController::class, 'store'])->name('session.user-division.store');

Route::apiResource('bank-contracts',            \App\Http\Controllers\BankContractController::class);
Route::apiResource('banks',                     \App\Http\Controllers\BankController::class);
Route::apiResource('divisions',                 \App\Http\Controllers\DivisionController::class);
Route::apiResource('payments',                  \App\Http\Controllers\PaymentController::class);
Route::apiResource('payment-events',            \App\Http\Controllers\PaymentEventController::class);
Route::apiResource('payment-files',             \App\Http\Controllers\PaymentFileController::class);
Route::apiResource('payment-raports',           \App\Http\Controllers\PaymentRaportController::class)->except('update');
Route::apiResource('templates',                 \App\Http\Controllers\TemplateController::class);
Route::apiResource('users',                     \App\Http\Controllers\UserController::class)->except('index');
