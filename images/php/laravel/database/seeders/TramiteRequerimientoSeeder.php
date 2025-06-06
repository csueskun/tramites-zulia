<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TramiteRequerimiento;

class TramiteRequerimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Paz y salvo ante runt',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Seguro Obligatorio de Accidentes de Tránsito (SOAT) vigente',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Tecnico Mecánica vigente',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Registro Único Nacional de Tránsito (RUNT) vigente',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Improntas',
            'vehiculo' => config('enums.vehiculo_types')[5], // EMPRESA
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Paz y salvo ante runt',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Seguro Obligatorio de Accidentes de Tránsito (SOAT) vigente',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Cámara de Comercio',
            'persona' => config('enums.persona_types')[2], // JURIDICA
        ]);
    }
}
