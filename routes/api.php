<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

Route::apiResource('banks', BankController::class);
Route::apiResource('writers', WriterController::class);
