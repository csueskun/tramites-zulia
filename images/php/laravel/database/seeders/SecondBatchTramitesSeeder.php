<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tramite;

class SecondBatchTramitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //LICENCIA DE CONDUCCIÓN
        $tramite = Tramite::create([
            'nombre' => 'Licencia de conducción',
            'descripcion' => 'Es un documento oficial que autoriza a una persona a conducir vehículos motorizados en vías públicas. La licencia de conducción certifica que el titular ha cumplido con los requisitos legales y ha demostrado las habilidades necesarias para operar un vehículo de manera segura y responsable',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Examen aprobado en la academia de conducción',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'examen_de_conduccion',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Cédula de ciudadanía o tarjeta de identidad (apartir de los 16 años)',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT',
            ],
            [
                'descripcion' => 'Estar inscrito en el RUNT',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ]
        ]);
        $tramite->items()->createMany([
            [
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 23000,
            ],
            [
                'nombre' => 'Sustrato lámina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'nombre' => 'Estampilla electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 43000,
            ]
        ]);

        //DUPLICADO LICENCIA DE CONDUCCIÓN
        $tramite = Tramite::create([
            'nombre' => 'Duplicado de licencia de conducción',
            'descripcion' => 'Trámite que permite obtener una copia de la licencia de conducción en caso de pérdida, deterioro o robo. Este duplicado certifica que el titular sigue cumpliendo con los requisitos legales para conducir vehículos motorizados en vías públicas',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Cédula de ciudadanía o tarjeta de identidad',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Tarjeta de Propiedad, Copia por Ambas Caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el tramite lo realiza un tercero, otorgado ó suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'SOAT (Vigente)',
            ],
            [
                'descripcion' => 'Revisión Técnico Mecánica (Vigente)',
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT (Propietario)',
            ],
            [
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ]
        ]);
        $tramite->items()->createMany([
            [
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 23000,
            ],
            [
                'nombre' => 'Sustrato lámina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'nombre' => 'Estampilla electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 36700,
            ]
        ]);


        //DUPLICADO LICENCIA DE TRANSITO
        $tramite = Tramite::create([
            'nombre' => 'Duplicado de licencia de tránsito',
            'descripcion' => 'Trámite que permite obtener una copia de la licencia de tránsito en caso de pérdida, deterioro o robo',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Cédula de ciudadanía o tarjeta de identidad',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Tarjeta de Propiedad, Copia por Ambas Caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el tramite lo realiza un tercero, otorgado ó suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'SOAT (Vigente)',
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT (Propietario)',
            ],
            [
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Revisión Técnico Mecánica (Vigente)',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ]
        ]);
        $tramite->items()->createMany([
            [
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 65000,
            ],
            [
                'nombre' => 'Sustrato lámina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'nombre' => 'Estampilla electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 43000,
            ]
        ]);

        //INSCRIPCIÓN DE LIMITACIÓN O GRAVAMEN
        $tramite = Tramite::create([
            'nombre' => 'Inscripción de limitación o gravamen a la propiedad de un vehículo automotor',
            'descripcion' => 'Trámite que permite registrar una limitación o gravamen sobre la propiedad de un vehículo en el Registro Único Nacional de Tránsito (RUNT), lo que puede afectar la propiedad o el uso del vehículo',
        ]);

        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Cédula de ciudadanía',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Tarjeta de Propiedad, Copia por Ambas Caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Certificación de inscripción de prenda',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'certificacion_de_prenda',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Cámara de comercio',
                'tipo' => 'ARCHIVO',
                'persona' => 'JURIDICA',
                'vehiculo' => 'CARRO',
                'file_metadata' => json_encode([
                    'nombre' => 'camara_de_comercio',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Cámara de comercio',
                'tipo' => 'ARCHIVO',
                'persona' => 'JURIDICA',
                'vehiculo' => 'MOTO',
                'file_metadata' => json_encode([
                    'nombre' => 'camara_de_comercio',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el tramite lo realiza un tercero, otorgado ó suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'SOAT (Vigente)',
            ],
            [
                'descripcion' => 'Revisión Técnico Mecánica (Vigente)',
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT (Propietario)',
            ],
            [
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ]
        ]);

        $tramite->vehiculos()->createMany([
            [
                'vehiculo' => 'CARRO',
            ],
            [
                'vehiculo' => 'MOTO',
            ],
            [
                'vehiculo' => 'REMOLQUE',
            ]
        ]);

        $tramite->personas()->createMany([
            [
                'persona' => 'NATURAL',
            ],
            [
                'persona' => 'JURIDICA',
            ]
        ]);

        $tramite->items()->createMany([
            [
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'vehiculo' => 'CARRO',
                'precio' => 65000,
            ],
            [
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'vehiculo' => 'MOTO',
                'precio' => 65000,
            ],
            [
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'vehiculo' => 'REMOLQUE',
                'precio' => 91000,
            ],
            [
                'nombre' => 'Estampilla electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'nombre' => 'Sustrato lámina',
                'descripcion' => '',
                'precio' => 25000,
            ],
            [
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 43000,
            ]
        ]);


        //TRASPASO DE PROPIEDAD A PERSONA INDETERMINADA
        $tramite = Tramite::create([
            'nombre' => 'Traspaso de propiedad a persona indeterminada',
            'descripcion' => 'Trámite que permite transferir la propiedad de un vehículo a una persona no especificada en el momento del trámite, facilitando futuras transferencias sin necesidad de identificar al nuevo propietario en el acto',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Cédula de ciudadanía',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'FUN Sin improntas',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Declaración juramentada ante notaría (donde se manifieste que el vehículo fue vendido hace más de 3 años, y desconoce el paradero)',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'declaracion_juramentada',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Datos del vehículo en el RUNT',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'runt',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el tramite lo realiza un tercero, otorgado ó suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760, // 10MB
                ]),
            ],
            [
                'descripcion' => 'SOAT (Vigente)',
            ],
            [
                'descripcion' => 'Revisión Técnico Mecánica (Vigente)',
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT (Propietario)',
            ],
            [
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ]
        ]);
        $tramite->items()->createMany([
            [
                'nombre' => 'Derecho de trámite',
                'descripcion' => '',
                'precio' => 160000,
            ],
            [
                'nombre' => 'Estampilla electrificación',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 3000,
            ],
            [
                'nombre' => 'Pro Hospital',
                'descripcion' => '',
                'tipo' => 'ESTAMPILLA',
                'precio' => 6000,
            ],
            [
                'nombre' => 'RUNT (CUPL)',
                'descripcion' => '',
                'precio' => 5500,
            ]
        ]);

    }
}
