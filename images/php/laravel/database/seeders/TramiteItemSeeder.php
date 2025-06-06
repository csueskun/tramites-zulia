<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TramiteItem;

class TramiteItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TramiteItem::factory()->createMany([
            [
                'tramite_id' => 1,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 160200,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'Sustrato lamina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'MT',
                'descripcion' => '',
                'precio' => 32600,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'RUNT',
                'descripcion' => '',
                'precio' => 2100,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'ELECTRIFICACIÓN',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'PRO HOSPITAL',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 70000,
                'vehiculo' => config('enums.vehiculo_types')[2], // MOTO
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 100000,
                'vehiculo' => config('enums.vehiculo_types')[3], // CARRO
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'Sustrato lamina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'MT',
                'descripcion' => '',
                'precio' => 32600,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'RUNT',
                'descripcion' => '',
                'precio' => 7800,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'ELECTRIFICACIÓN',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'PRO HOSPITAL',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'tramite_id' => 3,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 60000,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 91205,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'Sustrato lamina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'MT',
                'descripcion' => '',
                'precio' => 0,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'RUNT',
                'descripcion' => '',
                'precio' => 2100,
            ],
            [
                'tramite_id' => 5,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 22802,
            ],
            [
                'tramite_id' => 5,
                'nombre' => 'Sustrato lamina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'tramite_id' => 5,
                'nombre' => 'MT',
                'descripcion' => '',
                'precio' => 32600,
            ],
            [
                'tramite_id' => 5,
                'nombre' => 'RUNT',
                'descripcion' => '',
                'precio' => 2100,
            ],
            [
                'tramite_id' => 3,
                'nombre' => 'ELECTRIFICACIÓN',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 3,
                'nombre' => 'PRO HOSPITAL',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'ELECTRIFICACIÓN',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'PRO HOSPITAL',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
        ]);
    }
}
