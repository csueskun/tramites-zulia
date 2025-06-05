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
    }
}
