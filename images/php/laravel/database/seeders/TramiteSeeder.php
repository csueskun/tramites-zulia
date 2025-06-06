<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tramite;

class TramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        Tramite::factory()->createMany([
            [
                'nombre' => 'Traspaso de propiedad de un vehículo automotor',
                'descripcion' => 'Este trámite asegura que el nuevo propietario sea reconocido como el responsable legal del vehículo, cumpliendo con las obligaciones civiles y fiscales, como el pago de impuestos, multas y otros compromisos asociados al automóvil',
            ],
            [
                'nombre' => 'Levantamiento de limitacion o gravamen a un vehículo automotor',
                'descripcion' => 'El proceso legal mediante el cual se elimina una restricción, impedimento o condición que afecta la libre disposición del vehículo. Este gravamen puede haber sido impuesto por diversas razones, y su levantamiento permite que el propietario del vehículo lo venda, transfiera o disponga de él sin restricciones legales',
            ],
            [
                'nombre' => 'Certificado de libertad y tradicion de un vehículo automotor',
                'descripcion' => 'El certificado de libertad y tradicion de un vehiculo automotor incluye la información como su historial de propietarios, estado de los impuestos, posibles embargos, u otras restricciones legales que puedan afectar a la propiedad',
            ],
            [
                'nombre' => 'Duplicado de placas de un vehículo automotor',
                'descripcion' => 'Destrucción, deterioro o hurto, las cuales permiten identificar externa y privativamente un vehículo',
            ],
            [
                'nombre' => 'Renovación de licencia de conducción',
                'descripcion' => 'Este proceso permite actualizar la vigencia del documento, certificando que la persona sigue apta para conducir un vehículo al cumplir con las normativas de tránsito, mantener las habilidades necesarias y/o contar con condiciones médicas adecuadas según los requisitos establecidos',
            ],
        ]);
    }
}
