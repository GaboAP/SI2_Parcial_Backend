<?php

namespace Database\Seeders;

use App\Models\producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Producto 1',
                'talla' => 'M',
                'color' => 'Rojo',
                'precio' => 25.99,
                'categoriaId' => 1, // Hoodies
                'idInventario' => 1,
                'idUsuario'=>3
            ],
            [
                'nombre' => 'Producto 2',
                'talla' => 'L',
                'color' => 'Azul',
                'precio' => 19.99,
                'categoriaId' => 2, // Solera
                'idInventario' => 2,
                'idUsuario'=>3
            ],
            [
                'nombre' => 'Producto 1',
                'talla' => 'M',
                'color' => 'Rojo',
                'precio' => 25.99,
                'categoriaId' => 1, // Hoodies
                'idInventario' => 1,
                'idUsuario'=>3
            ],
            [
                'nombre' => 'Producto 2',
                'talla' => 'L',
                'color' => 'Azul',
                'precio' => 19.99,
                'categoriaId' => 2, // Solera
                'idInventario' => 2,
                'idUsuario'=>3
            ],
            [
                'nombre' => 'Producto 3',
                'talla' => 'S',
                'color' => 'Verde',
                'precio' => 14.99,
                'categoriaId' => 3, // Medias
                'idInventario' => 3,
                'idUsuario'=>3
            ],
            [
                'nombre' => 'Producto 4',
                'talla' => 'XL',
                'color' => 'Negro',
                'precio' => 29.99,
                'categoriaId' => 1, // Hoodies
                'idInventario' => 4,
                'idUsuario'=>3
            ],
            [
                'nombre' => 'Producto 5',
                'talla' => 'M',
                'color' => 'Blanco',
                'precio' => 22.99,
                'categoriaId' => 2, // Solera
                'idInventario' => 5,
                'idUsuario'=>3
            ],
            [
                'nombre' => 'Producto 6',
                'talla' => 'L',
                'color' => 'Gris',
                'precio' => 16.99,
                'categoriaId' => 3, // Medias
                'idInventario' => 6,
                'idUsuario'=>3
            ],
        ];

        foreach ($productos as $producto) {
            producto::create($producto);
        }
    }
}
