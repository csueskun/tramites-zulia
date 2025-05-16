<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tramite;
use App\Models\TramiteItem;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

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
            'password' => 'admin',
        ], );

        Tramite::factory()->createMany([
            [
                'nombre' => 'Traspaso de propiedad de un vehículo automotor',
                'descripcion' => 'Este trámite asegura que el nuevo propietario sea reconocido como el responsable legal del vehículo, cumpliendo con las obligaciones civiles y fiscales, como el pago de impuestos, multas y otros compromisos asociados al automóvil',
                'precio' => 225000,
            ],
            [
                'nombre' => 'Levantamiento de limitacion o gravamen a un vehículo automotor',
                'descripcion' => 'El proceso legal mediante el cual se elimina una restricción, impedimento o condición que afecta la libre disposición del vehículo. Este gravamen puede haber sido impuesto por diversas razones, y su levantamiento permite que el propietario del vehículo lo venda, transfiera o disponga de él sin restricciones legales',
                'precio' => 60000,
            ],
            [
                'nombre' => 'Certificado de libertad y tradicion de un vehículo automotor',
                'descripcion' => 'El certificado de libertad y tradicion de un vehiculo automotor incluye la información como su historial de propietarios, estado de los impuestos, posibles embargos, u otras restricciones legales que puedan afectar a la propiedad',
                'precio' => 133804,
            ],
            [
                'nombre' => 'Duplicado de placas de un vehículo automotor',
                'descripcion' => 'Destrucción, deterioro o hurto, las cuales permiten identificar externa y privativamente un vehículo',
                'precio' => 118305,
            ],
            [
                'nombre' => 'Renovación de licencia de conducción',
                'descripcion' => 'Este proceso permite actualizar la vigencia del documento, certificando que la persona sigue apta para conducir un vehículo al cumplir con las normativas de tránsito, mantener las habilidades necesarias y/o contar con condiciones médicas adecuadas según los requisitos establecidos',
                'precio' => 82502,
            ],
        ]);

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
                'tramite_id' => 2,
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 68404,
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
        ]);

    }
}
