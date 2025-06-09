<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TramitePersona;

class TramitePersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TramitePersona::create([
            'tramite_id' => 2,
            'persona' => 'NATURAL',
        ]);
        TramitePersona::create([
            'tramite_id' => 2,
            'persona' => 'JURIDICA',
        ]);
    }
}
