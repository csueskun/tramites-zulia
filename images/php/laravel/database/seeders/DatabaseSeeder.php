<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TramiteSeeder;
use Database\Seeders\TramiteItemSeeder;
use Database\Seeders\TramiteRquerimientoSeeder;

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
        $this->call(TramiteRquerimientoSeeder::class);
    }
}