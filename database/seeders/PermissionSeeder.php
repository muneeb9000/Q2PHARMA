<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define the permissions you want to insert
        $permissions = [
            ['name' => 'Add Companies', 'prefix' => 'companies_add',  'guard_name' => 'web',  'module_id' => 1 ],
            ['name' => 'Edit Companies', 'prefix' => 'companies_edit', 'guard_name' => 'web', 'module_id' => 1],
            ['name' => 'View Companies', 'prefix' => 'companies_view','guard_name' => 'web', 'module_id' => 1],
            ['name' => 'Delete Companies','prefix' => 'companies_delete', 'guard_name' => 'web', 'module_id' => 1],

            ['name' => 'Add Customers', 'prefix' => 'customers_add', 'guard_name' => 'web', 'module_id' => 2],
            ['name' => 'Edit Customers','prefix' => 'customers_edit',  'guard_name' => 'web', 'module_id' => 2],
            ['name' => 'View Customers', 'prefix' => 'customers_view', 'guard_name' => 'web', 'module_id' => 2],
            ['name' => 'Delete Customers', 'prefix' => 'customers_delete', 'guard_name' => 'web', 'module_id' => 2],

            ['name' => 'Add UOM','prefix' => 'uom_add',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Edit UOM', 'prefix' => 'uom_edit', 'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'View UOM','prefix' => 'uom_view',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Delete UOM','prefix' => 'uom_delete',  'guard_name' => 'web', 'module_id' => 3],

            ['name' => 'Add Category','prefix' => 'category_add',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Edit Category', 'prefix' => 'category_edit', 'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'View Category','prefix' => 'category_view',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Delete Category','prefix' => 'category_delete',  'guard_name' => 'web', 'module_id' => 3],

            ['name' => 'Add Product','prefix' => 'product_add',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Edit Product', 'prefix' => 'product_edit', 'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'View Product','prefix' => 'product_view',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Delete Product','prefix' => 'product_delete',  'guard_name' => 'web', 'module_id' => 3],

            ['name' => 'Add Supplier','prefix' => 'supplier_add',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Edit Supplier', 'prefix' => 'supplier_edit', 'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'View Supplier','prefix' => 'supplier_view',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Delete Supplier','prefix' => 'supplier_delete',  'guard_name' => 'web', 'module_id' => 3],

            ['name' => 'Add Warehouse','prefix' => 'warehouse_add',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Edit Warehouse', 'prefix' => 'warehouse_edit', 'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'View Warehouse','prefix' => 'warehouse_view',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Delete Warehouse','prefix' => 'warehouse_delete',  'guard_name' => 'web', 'module_id' => 3],

            ['name' => 'Add Purchase','prefix' => 'purchase_add',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Edit Purchase', 'prefix' => 'purchase_edit', 'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'View Purchase','prefix' => 'purchase_view',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Delete Purchase','prefix' => 'purchase_delete',  'guard_name' => 'web', 'module_id' => 3],

            ['name' => 'Add Sale','prefix' => 'sale_add',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Edit Sale', 'prefix' => 'sale_edit', 'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'View Sale','prefix' => 'sale_view',  'guard_name' => 'web', 'module_id' => 3],
            ['name' => 'Delete Sale','prefix' => 'sale_delete',  'guard_name' => 'web', 'module_id' => 3],
      
            ['name' => 'Add City','prefix' => 'city_add',  'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'Edit City', 'prefix' => 'city_edit', 'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'View City','prefix' => 'city_view',  'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'Delete City','prefix' => 'city_delete',  'guard_name' => 'web', 'module_id' => 4],

            ['name' => 'Add Area','prefix' => 'area_add',  'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'Edit Area', 'prefix' => 'area_edit', 'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'View Area','prefix' => 'area_view',  'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'Delete Area','prefix' => 'area_delete',  'guard_name' => 'web', 'module_id' => 4],

            ['name' => 'Add Subarea','prefix' => 'subarea_add',  'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'Edit Subarea', 'prefix' => 'subarea_edit', 'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'View Subarea','prefix' => 'subarea_view',  'guard_name' => 'web', 'module_id' => 4],
            ['name' => 'Delete Subarea','prefix' => 'subarea_delete',  'guard_name' => 'web', 'module_id' => 4],

            ['name' => 'Add Employee','prefix' => 'employee_add',  'guard_name' => 'web', 'module_id' => 5],
            ['name' => 'Edit Employee', 'prefix' => 'employee_edit', 'guard_name' => 'web', 'module_id' => 5],
            ['name' => 'View Employee','prefix' => 'employee_view',  'guard_name' => 'web', 'module_id' => 5],
            ['name' => 'Delete Employee','prefix' => 'employee_delete',  'guard_name' => 'web', 'module_id' => 5],

            ['name' => 'Sales Invoices','prefix' => 'sales_invoices',  'guard_name' => 'web', 'module_id' => 6],
            ['name' => 'Purchase Invoices', 'prefix' => 'purchase_invoices', 'guard_name' => 'web', 'module_id' => 6],
            ['name' => 'Sales Invoices Payment','prefix' => 'sales_invoices_payment',  'guard_name' => 'web', 'module_id' => 6],
            ['name' => 'Purchase Invoices Payment', 'prefix' => 'purchase_invoices_payment', 'guard_name' => 'web', 'module_id' => 6],
            ['name' => 'Add Transaction','prefix' => 'transaction_add',  'guard_name' => 'web', 'module_id' => 6],
            ['name' => 'Edit Transaction','prefix' => 'transaction_edit',  'guard_name' => 'web', 'module_id' => 6],
            ['name' => 'View Transaction','prefix' => 'transaction_view',  'guard_name' => 'web', 'module_id' => 6],
            ['name' => 'Delete Transaction','prefix' => 'transaction_delete',  'guard_name' => 'web', 'module_id' => 6],

        ];

        foreach ($permissions as $permission) {
            Permission::create(array_merge($permission, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
