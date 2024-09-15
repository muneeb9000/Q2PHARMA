<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AccountsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('CustomAuth');

Route::post('/apilogin', [AuthController::class, 'apilogin']);

// Example of route group with middleware
Route::middleware('CustomAuth')->group(function () {

Route::post('/sales/add', [SalesController::class, 'storeSaleAPI']);

Route::get('/customers', [CustomersController::class, 'apiIndex']);

Route::get('/products', [ProductsController::class, 'productsapi']);

Route::get('/sales/customer/{customer_id}', [AccountsController::class, 'salesInvoicesByCustomer']);

Route::post('/sales/{id}/payment', [SalesController::class, 'salepaymentapi']);


});

