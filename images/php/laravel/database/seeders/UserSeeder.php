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
            'nombres' => 'Edward',
            'apellidos' => 'Arteaga',
            'email' => 'earteagaeling@gmail.com',
            'role' => 'USER',
            'documento' => 881234765,
            'tipo_documento' => 'CC',
            'password' => 'Edward12*',
        ], );

        User::factory()->create([
            'nombres' => 'Noheli Lucerito',
            'apellidos' => 'Delgado',
            'email' => 'nldc0901@gmail.com',
            'role' => 'USER',
            'documento' => 37147937,
            'tipo_documento' => 'CC',
            'password' => 'Noeli12*',
        ], );

        User::factory()->create([
            'nombres' => 'Radicador',
            'apellidos' => 'Trámites',
            'email' => 'radicador@tramites.com',
            'role' => 'RADICADO',
            'documento' => 37147900,
            'tipo_documento' => 'CC',
            'password' => 'radicador',
        ], );

    }
}
