<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Crear tres usuarios de ejemplo
                DB::table('users')->insert([
                    'Carnet_Identidad' => 123456789,
                    'name' => 'Admin User',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('password123'), // Cambia esta contraseña según tus necesidades
                    'Ciudad' => 'ABC',
                    'Direccion' => 'Calle Principal 123',
                    'rol' => 0, // 0 para admin
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        
                DB::table('users')->insert([
                    'Carnet_Identidad' => 987654321,
                    'name' => 'Cliente User 1',
                    'email' => 'cliente1@example.com',
                    'password' => Hash::make('password123'), // Cambia esta contraseña según tus necesidades
                    'Ciudad' => 'XYZ',
                    'Direccion' => 'Avenida Secundaria 456',
                    'rol' => 1, // 1 para cliente
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        
                DB::table('users')->insert([
                    'Carnet_Identidad' => 555555555,
                    'name' => 'Cliente User 2',
                    'email' => 'cliente2@example.com',
                    'password' => Hash::make('password123'), // Cambia esta contraseña según tus necesidades
                    'Ciudad' => 'DEF',
                    'Direccion' => 'Calle Secundaria 789',
                    'rol' => 1, // 1 para cliente
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
}
