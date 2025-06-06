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
            'persona' => config('enums.persona_types')[0], // NATURAL
        ]);
        TramitePersona::create([
            'tramite_id' => 2,
            'persona' => config('enums.persona_types')[1], // JURIDICA
        ]);
    }
}
