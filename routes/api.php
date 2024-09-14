<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Example of route group with middleware
Route::middleware('CustomAuth')->group(function () {
    Route::post('/sales/add', [SalesController::class, 'storeSaleAPI']);
});
