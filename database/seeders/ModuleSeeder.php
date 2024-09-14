<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'name' => 'Companies',
                'prefix' => 'companies',
            ],
            [
                'name' => 'Customers',
                'prefix' => 'customers',
            ],
            [
                'name' => 'Inventory',
                'prefix' => 'inventory',
            ],
            [
                'name' => 'Route Management',
                'prefix' => 'route_management',
            ],
            [
                'name' => 'Employees',
                'prefix' => 'employees',
            ],
            [
                'name' => 'Accounts',
                'prefix' => 'accounts',
            ],
            [
                'name' => 'General Setting',
                'prefix' => 'setting',
            ],
            [
                'name' => 'Reports',
                'prefix' => 'reports',
            ]
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
