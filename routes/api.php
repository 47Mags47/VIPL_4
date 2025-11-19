<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('banks',             \App\Http\Controllers\BankController::class);
Route::apiResource('bank-contracts',    \App\Http\Controllers\BankContractController::class);
Route::apiResource('writers',           \App\Http\Controllers\WriterController::class);
Route::apiResource('templates',         \App\Http\Controllers\TemplateController::class);
