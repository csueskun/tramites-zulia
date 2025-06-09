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
        //Traspaso de vehículo
        TramiteItem::factory()->createMany([
            [
                'tramite_id' => 1,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 160200,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'Sustrato lámina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'MT',
                'descripcion' => '',
                'precio' => 34900,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 4900,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'Electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'tramite_id' => 1,
                'nombre' => 'Pro Adulto',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 0,
            ],
        ]);
        

        //Levantamiento de prenda
        TramiteItem::factory()->createMany([
            [
                'tramite_id' => 2,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'vehiculo' => 'CARRO',
                'precio' => 91205,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'vehiculo' => 'MOTO',
                'precio' => 68404,
            ],
            [
                'tramite_id' => 2,  
                'nombre' => 'Sustrato lámina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 40400,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'Electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'tramite_id' => 2,
                'nombre' => 'Pro Adulto',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 0,
            ],
        ]);

        //Certificación de tradición y libertad
        TramiteItem::factory()->createMany([
            [
                'tramite_id' => 3,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 60000,
            ],
            [
                'tramite_id' => 3,
                'nombre' => 'Electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 3,
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'tramite_id' => 3,
                'nombre' => 'Pro-des Académico',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 4500,
            ],
            [
                'tramite_id' => 3,
                'nombre' => 'Pro Cultura',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 14000,
            ],
            [
                'tramite_id' => 3,
                'nombre' => 'Pro-des/DPTL',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
        ]);

        //Duplicado de placas
        TramiteItem::factory()->createMany([
            [
                'tramite_id' => 4,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'vehiculo' => 'MOTO',
                'precio' => 91205,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'vehiculo' => 'CARRO',
                'precio' => 137136,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'Sustrato lámina',
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
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 2100,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'Electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'tramite_id' => 4,
                'nombre' => 'Pro Adulto',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 0,
            ],
        ]);

        //Renovación
        TramiteItem::factory()->createMany([
            [
                'tramite_id' => 5,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 22802,
            ],
            [
                'tramite_id' => 5,
                'nombre' => 'Sustrato lámina',
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
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 2100,
            ],
            [
                'tramite_id' => 5,
                'nombre' => 'Electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'tramite_id' => 5,
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'tramite_id' => 5,
                'nombre' => 'Pro Adulto',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 0,
            ],
        ]);
    }
}
