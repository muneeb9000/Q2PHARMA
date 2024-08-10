<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\SubAreaController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SupplierController;

// Public Auth Routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Apply middleware to routes
Route::middleware('CustomAuth')->group(function () {
    Route::resource('companies', CompaniesController::class);
    Route::resource('city', CitiesController::class);
    Route::resource('area', AreasController::class);
    Route::resource('subarea', SubAreaController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('units', UnitsController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('supplier', SupplierController::class);
    Route::get('products/import', [ProductsController::class, 'import'])->name('products.import');



    // Dropdown Routes
    
    Route::get('/get-units/{categoryId}', [ProductsController::class, 'getUnits']);
    Route::get('/get-areas/{cityId}', [AreasController::class, 'getAreas']);
    Route::get('/get-sub-areas/{areaId}', [SubAreaController::class, 'getSubAreas']);
    Route::get('/get-cities/{companyId}', [CitiesController::class, 'getCities']);
    Route::get('/get-categories/{companyId}', [ProductsController::class, 'getCategories']);

    // Auth Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
});
