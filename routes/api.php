<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->post('/session',            [\App\Http\Controllers\SessionController::class, 'store'])->name('session.store');
Route::middleware('auth')->delete('/session/destroy',   [\App\Http\Controllers\SessionController::class, 'destroy'])->name('session.destroy');

Route::apiResource('banks',             \App\Http\Controllers\BankController::class);
Route::apiResource('bank-contracts',    \App\Http\Controllers\BankContractController::class);
Route::apiResource('divisions',         \App\Http\Controllers\DivisionController::class);
Route::apiResource('payments',          \App\Http\Controllers\PaymentController::class);
Route::apiResource('payment-events',    \App\Http\Controllers\PaymentEventController::class);
Route::apiResource('payment-files',     \App\Http\Controllers\PaymentFileController::class);
Route::apiResource('templates',         \App\Http\Controllers\TemplateController::class);
Route::apiResource('users',             \App\Http\Controllers\UserController::class)->except('index');
Route::apiResource('writers',           \App\Http\Controllers\WriterController::class);
