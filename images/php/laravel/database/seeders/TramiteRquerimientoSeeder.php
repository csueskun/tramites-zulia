<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TramiteRquerimiento;

class TramiteRquerimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TramiteRquerimiento::create([
            'tramite_id' => 1,
            'nombre' => 'Paz y Salvo',
            'descripcion' => 'Paz y salvo ante runt.',
        ]);
        TramiteRquerimiento::create([
            'tramite_id' => 1,
            'nombre' => 'SOAT',
            'descripcion' => 'Seguro Obligatorio de Accidentes de Tránsito (SOAT) vigente.',
        ]);
        TramiteRquerimiento::create([
            'tramite_id' => 1,
            'nombre' => 'Tecnico Mecánica',
            'descripcion' => 'Tecnico Mecánica vigente.',
        ]);
        TramiteRquerimiento::create([
            'tramite_id' => 1,
            'nombre' => 'RUNT',
            'descripcion' => 'Registro Único Nacional de Tránsito (RUNT) vigente.',
        ]);
    }
}
