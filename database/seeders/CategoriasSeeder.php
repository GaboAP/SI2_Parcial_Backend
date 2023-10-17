<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Poleras',
            'Vestidos',
            'Medias',
            'Pantalones',
            'Camisas',
            'Abrigos',
            'Zapatos',
            'Sombreros',
            'Bufandas',
            'Chaquetas',
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nombre' => $categoria,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
