<?php

namespace Database\Seeders;

use App\Models\Designations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Assistant Admin',
            ],
            [
                'name' => 'Purchaser',
            ],
            [
                'name' => 'Sales Man',
            ],
            [
                'name' => 'Sweeper',
            ],
            [
                'name' => 'Security Guard',
            ],

        ];

        foreach($designations as $designation){
            Designations::create($designation);
        }
    }
}
