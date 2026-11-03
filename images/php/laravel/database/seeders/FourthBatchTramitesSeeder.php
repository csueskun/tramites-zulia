<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tramite;

class FourthBatchTramitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //CAMBIO DE LICENCIA DE CONDUCCIÓN POR MAYORÍA DE EDAD
        $tramite = Tramite::create([
            'nombre' => 'Cambio de licencia de conducción por mayoría de edad',
            'descripcion' => 'Trámite que permite actualizar la licencia de conducción al cumplir la mayoría de edad, reemplazando el documento expedido a nombre de un menor por una licencia vigente a nombre del conductor, con su respectivo registro en el Registro Único Nacional de Tránsito (RUNT)',
            'codigo' => 'CLMAY',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Copia de la cédula',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT (propietario)',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
            [
                'descripcion' => 'Estar inscrito en el RUNT como persona natural',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 29000],
            ['nombre' => 'Sustrato lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 44800],
        ]);

        //CANCELACIÓN DE MATRÍCULA
        $tramite = Tramite::create([
            'nombre' => 'Cancelación de matrícula',
            'descripcion' => 'Trámite que permite cancelar la matrícula de un vehículo automotor ante las autoridades de tránsito, generalmente después de su chatarrización, dando de baja el vehículo en el Registro Único Nacional de Tránsito (RUNT)',
            'codigo' => 'CANMA',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Copia de la cédula',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Copia de la tarjeta de propiedad',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado, con improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Resolución de cancelación',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'resolucion_cancelacion',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Acta de chatarrización',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'acta_chatarrizacion',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Revisión de la SIJIN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'revision_sijin',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Poder autenticado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'SOAT (vigente)',
            ],
            [
                'descripcion' => 'Revisión técnico mecánica (vigente)',
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT (propietario)',
            ],
            [
                'descripcion' => 'Paz y salvo de impuestos del vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
            [
                'descripcion' => 'Consultar que el vehículo esté migrado en el RUNT',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 233000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 2400],
        ]);

        //RADICACIÓN DE CUENTA (CARRO / MOTO)
        $tramite = Tramite::create([
            'nombre' => 'Radicación de cuenta',
            'descripcion' => 'Trámite que permite radicar la cuenta de un vehículo automotor tipo carro o moto, registrando la actualización de su información de propiedad y ubicación ante las autoridades de tránsito y en el Registro Único Nacional de Tránsito (RUNT)',
            'codigo' => 'RACAR',
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Copia de la cédula',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Copia de la tarjeta de propiedad',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado, con improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Poder autenticado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'SOAT (vigente)',
            ],
            [
                'descripcion' => 'Revisión técnico mecánica (vigente)',
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT (propietario)',
            ],
            [
                'descripcion' => 'Paz y salvo de impuestos del vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
            [
                'descripcion' => 'Consultar que el vehículo esté migrado en el RUNT',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'vehiculo' => 'CARRO', 'precio' => 146000],
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'vehiculo' => 'MOTO', 'precio' => 117000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla Pro desarrollo académico', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 30000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);
    }
}
