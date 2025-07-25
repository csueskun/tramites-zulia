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
                'descripcion' => 'Obtener la inscripción de la transferencia de la propiedad de un vehículo automotor',
            ],
            [
                'nombre' => 'Levantamiento de limitación o gravamen a un vehículo automotor',
                'descripcion' => 'Levantar limitaciones o gravámenes a la propiedad de un vehículo automotor',
            ],
            [
                'nombre' => 'Certificado de libertad y tradición de un vehículo automotor',
                'descripcion' => 'Obtener el certificado que determina la titularidad del dominio, las características del vehículo, medidas cautelares, limitaciones, gravámenes y un registro histórico donde se refleja todas las actuaciones y trámites realizados al automotor desde la fecha de expedición de la matrícula inicial',
            ],
            [
                'nombre' => 'Duplicado de placas de un vehículo automotor',
                'descripcion' => 'Expedición del duplicado de la(s) placa(s) de un vehículo automotor, en caso de pérdida, destrucción, deterioro o hurto, las cuales permiten identificar externa y privativamente un vehículo',
            ],
            [
                'nombre' => 'Renovación de licencia de conducción',
                'descripcion' => 'Obtener la renovación de la fecha de vigencia de la licencia de conducción, en caso de ser para servicio público la renovación se hará por tres (3) años, si es mayor de sesenta (60) años por un (1) año, si es de servicio particular por diez (10) años para los menores de sesenta (60) años, cinco (5) años para los conductores entre sesenta (60) y ochenta (80) años y anualmente para los conductores mayores de ochenta (80) años de edad',
            ],
        ]);
    }
}
