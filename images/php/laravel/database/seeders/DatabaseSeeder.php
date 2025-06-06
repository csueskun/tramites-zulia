<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TramiteSeeder;
use Database\Seeders\TramiteItemSeeder;
use Database\Seeders\TramiteRequerimientoSeeder;
use Database\Seeders\TramiteVehiculosSeeder;
use Database\Seeders\TramitePersonaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(TramiteSeeder::class);
        $this->call(TramiteItemSeeder::class);
        $this->call(TramiteRequerimientoSeeder::class);
        $this->call(TramiteVehiculosSeeder::class);
        $this->call(TramitePersonaSeeder::class);
    }
}