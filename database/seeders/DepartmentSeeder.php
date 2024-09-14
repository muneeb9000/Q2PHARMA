<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departments;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Administration',
            ],
            [
                'name' => 'Sales',
            ],
            [
                'name' => 'Purchase',
            ],
            [
                'name' => 'General',
            ],

        ];

        foreach($departments as $department){
            Departments::create($department);
        }
    }
}
