<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'nombres' => 'Admin',
            'apellidos' => 'Admin',
            'email' => 'admin@tramites.com',
            'role' => 'ADMIN',
            'documento' => 123456789,
            'tipo_documento' => 'CC',
            'password' => 'admin',
        ], );

        User::factory()->create([
            'nombres' => 'Usuario',
            'apellidos' => 'Apellido',
            'email' => 'user@tramites.com',
            'role' => 'USER',
            'documento' => 234567890,
            'tipo_documento' => 'CC',
            'password' => 'user',
        ], );

        User::factory()->create([
            'nombres' => 'Robert',
            'apellidos' => 'Rojas',
            'email' => 'robert11unofirst@gmail.com',
            'role' => 'USER',
            'documento' => 88246807,
            'tipo_documento' => 'CC',
            'password' => 'robert',
        ], );

        User::factory()->create([
            'nombres' => 'Carlos',
            'apellidos' => 'Monsalve',
            'email' => 'csueskun@gmail.com',
            'role' => 'USER',
            'documento' => 1090909090,
            'tipo_documento' => 'CC',
            'password' => 'robert',
        ], );
    }
}
