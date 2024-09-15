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
use App\Http\Controllers\WarehousesController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;

// Public Auth Routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




// Apply middleware to routes

// Authentication Routes
    Route::middleware('CustomAuth')->group(function () {
// Companies Routes    
    Route::resource('companies', CompaniesController::class);
// Roles Roles    
    Route::resource('roles', RoleController::class);   
    Route::post('/roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.updatePermissions');
 
// Cities Routes
    Route::resource('city', CitiesController::class);
// Area Routes  
    Route::resource('area', AreasController::class);
// Sub Area Routes  
    Route::resource('subarea', SubAreaController::class);
// Customers Routes 
    Route::resource('customers', CustomersController::class);
// Units Routes 
    Route::resource('units', UnitsController::class);
// Category Routes
    Route::resource('category', CategoryController::class);
// Products Routes 
    Route::resource('products', ProductsController::class);
    Route::get('products/import', [ProductsController::class, 'import'])->name('products.import');
// Supplier Routes
    Route::resource('supplier', SupplierController::class);
//Warehouse Routes
    Route::resource('warehouse', WarehousesController::class);
//Employee Routes
Route::resource('employee', EmployeeController::class);    
// Purchases Routes
    Route::resource('purchases', PurchasesController::class);
    Route::put('/purchasepayment/{id}', [PurchasesController::class, 'purchasepayment'])->name('purchasepayment');
 // Sales Routes 
    Route::resource('sales', SalesController::class);
    Route::put('/salepayment/{id}', [SalesController::class, 'salepayment'])->name('salepayment');
// Accounts Routes
    Route::resource('accounts', AccountsController::class);
    Route::get('salesinvoices', [AccountsController::class, 'salesinvoices'])->name('sales.invoices');
    Route::get('saleprint/{id}', [AccountsController::class, 'saleprint'])->name('sales.print');
    Route::get('purchaseinvoices', [AccountsController::class, 'purchaseinvoices'])->name('purchases.invoices');
    Route::get('purchasesprint/{id}', [AccountsController::class, 'purchaseprint'])->name('purchases.print');
   
    // Dropdown Routes 
    Route::get('/get-units/{categoryId}', [ProductsController::class, 'getUnits']);
    Route::get('/get-areas/{cityId}', [AreasController::class, 'getAreas']);
    Route::get('/get-sub-areas/{areaId}', [SubAreaController::class, 'getSubAreas']);
    Route::get('/get-cities/{companyId}', [CitiesController::class, 'getCities']);
    Route::get('/get-categories/{companyId}', [ProductsController::class, 'getCategories']);
    Route::get('get-suppliers/{companyId}', [PurchasesController::class, 'getSuppliers']);
    Route::get('get-customers/{companyId}', [SalesController::class, 'getCustomers']);
    Route::get('get-warehouses/{companyId}', [PurchasesController::class, 'getWarehouses']);
    Route::get('get-purchases/{companyId}', [PurchasesController::class, 'getPurchases']);
    Route::get('/get-purchase-products/{purchase}', [PurchasesController::class, 'getPurchaseProducts']);
    Route::post('/purchases/update-stock', [PurchasesController::class, 'updateStock'])->name('purchases.updateStock');
    Route::post('/purchases/return/{id}', [PurchasesController::class, 'returnPurchase'])->name('purchases.return');

    // Auth Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::get('/chart-data', [DashboardController::class, 'chart']);
  


});
