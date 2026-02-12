<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return Inertia::render('test');
});

Route::post('/sessions',                    [\App\Http\Controllers\Web\SessionController::class, 'store'])->name('session.store');

Route::delete('/sessions/destroy',           [\App\Http\Controllers\Web\SessionController::class, 'destroy'])->name('session.destroy');

Route::get('/sessions/user-divisions',       [\App\Http\Controllers\Web\SessionUserDivisionController::class, 'index'])->name('session.user-division.index');
Route::post('/sessions/user-divisions',      [\App\Http\Controllers\Web\SessionUserDivisionController::class, 'store'])->name('session.user-division.store');

Route::apiResource('bank-contracts',            \App\Http\Controllers\Web\BankContractController::class);
Route::apiResource('banks',                     \App\Http\Controllers\Web\BankController::class);
Route::apiResource('divisions',                 \App\Http\Controllers\Web\DivisionController::class);
Route::apiResource('payments',                  \App\Http\Controllers\Web\PaymentController::class);
Route::apiResource('payment-events',            \App\Http\Controllers\Web\PaymentEventController::class);
Route::apiResource('payment-files',             \App\Http\Controllers\Web\PaymentFileController::class);
Route::apiResource('payment-raports',           \App\Http\Controllers\Web\PaymentRaportController::class)->except('update');
Route::apiResource('templates',                 \App\Http\Controllers\Web\TemplateController::class);
Route::apiResource('users',                     \App\Http\Controllers\Web\UserController::class)->except('index');
