<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('inventarios')->insert([
                'stock' => rand(1, 100), // Stock aleatorio entre 1 y 100
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
