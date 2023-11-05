<?php

use App\Modules\Billing\Controllers\v1\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get("/v1/calculator", [CalculatorController::class, 'calculate'])
    ->name('v1.calculator.calculate');
