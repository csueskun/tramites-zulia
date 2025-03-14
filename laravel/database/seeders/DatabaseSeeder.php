<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nombres' => 'Admin',
            'apellidos' => 'Admin',
            'email' => 'admin@tramites.com',
            'role' => 'ADMIN',
            'documento' => 123456789,
            'tipo_documento' => 'CC',
            'password' => 'admin',
        ],);

        User::factory()->create([
            'nombres' => 'Usuario',
            'apellidos' => 'Apellido',
            'email' => 'csueskun2@tramites.com',
            'role' => 'USER',
            'documento' => 234567890,
            'tipo_documento' => 'CC',
            'password' => 'admin',
        ],);


    }
}
