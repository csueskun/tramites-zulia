<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tramite;

class ThirdBatchTramitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //CAMBIO DE CARROCERÍA
        $tramite = Tramite::create([
            'nombre' => 'Cambio de carrocería',
            'descripcion' => 'Trámite que permite realizar el cambio legal de carrocería de un vehículo ante las autoridades de tránsito',
            'codigo' => 'CACAR',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la cédula del propietario',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura taller de carrocería y/o carta de solicitud de cambio de carrocería',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'factura_carroceria',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero, otorgado o suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
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
                'descripcion' => 'Impuestos al día',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 262000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);


        //CAMBIO DE COLOR
        $tramite = Tramite::create([
            'nombre' => 'Cambio de color',
            'descripcion' => 'Trámite que permite formalizar el cambio de color de un vehículo ante las autoridades de tránsito',
            'codigo' => 'CACOL',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Factura del Taller debidamente diligenciada',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'factura_taller',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la cédula del propietario',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la tarjeta de propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura taller de pintura y/o carta de solicitud de cambio color',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'factura_carroceria',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero, otorgado o suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
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
                'descripcion' => 'Impuestos al día',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 292000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);


        //CAMBIO DE MOTOR
        $tramite = Tramite::create([
            'nombre' => 'Cambio de motor',
            'descripcion' => 'Trámite que permite realizar el cambio de motor de un vehículo ante las autoridades de tránsito',
            'codigo' => 'CAMOT',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la cédula del propietario',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la tarjeta de propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura compra (electrónica y cámara de comercio) debidamente legalizada',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'factura_compra',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Manifiesto',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'manifiesto',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Revisión de la SIJIN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'revision_sijin',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero, otorgado o suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
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
                'descripcion' => 'Impuestos al día',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 292000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);


        //CONVERSIÓN A GAS NATURAL
        $tramite = Tramite::create([
            'nombre' => 'Conversión (transformación) a Gas Natural',
            'descripcion' => 'Trámite que permite realizar la conversión a gas natural de un vehículo ante las autoridades de tránsito',
            'codigo' => 'COGNA',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la cédula del propietario',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la tarjeta de propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Revisión de la SIJIN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'revision_sijin',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero, otorgado o suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
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
                'descripcion' => 'Impuestos al día',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 262000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);


        //REGRABACIÓN DE MOTOR
        $tramite = Tramite::create([
            'nombre' => 'Regrabación de motor',
            'descripcion' => 'Trámite que permite realizar la regrabación del número de motor de un vehículo ante las autoridades de tránsito',
            'codigo' => 'REMOT',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la cédula del propietario',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la tarjeta de propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Certificación de taller',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'factura_compra',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Revisión de la SIJIN (antes y el después de regrabado)',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'revision_sijin',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero, otorgado o suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
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
                'descripcion' => 'Impuestos al día',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 292000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);


        //REGRABACIÓN DE SERIAL
        $tramite = Tramite::create([
            'nombre' => 'Regrabación de serial',
            'descripcion' => 'Trámite que permite realizar la regrabación del número de serial de un vehículo ante las autoridades de tránsito',
            'codigo' => 'RESER',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la cédula del propietario',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la tarjeta de propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Certificación de taller',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'factura_compra',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Revisión de la SIJIN (antes y después de regrabado)',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'revision_sijin',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero, otorgado o suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
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
                'descripcion' => 'Impuestos al día',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 292000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);


        //REGRABACIÓN DE CHASIS
        $tramite = Tramite::create([
            'nombre' => 'Regrabación de chasis',
            'descripcion' => 'Trámite que permite realizar la regrabación del número de chasis de un vehículo ante las autoridades de tránsito',
            'codigo' => 'RECHA',
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la cédula del propietario',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la tarjeta de propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Certificación de taller',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'factura_compra',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Revisión de la SIJIN (antes y el después de regrabado)',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'revision_sijin',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero, otorgado o suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
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
                'descripcion' => 'Impuestos al día',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 292000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);


        //MATRÍCULA INICIAL
        $tramite = Tramite::create([
            'nombre' => 'Matrícula inicial',
            'descripcion' => 'Trámite que permite obtener la matrícula inicial de un vehículo automotor, otorgando su placa e inscribiéndolo por primera vez en el Registro Único Nacional de Tránsito (RUNT) ante las autoridades de tránsito',
            'codigo' => 'MAINI',
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
        ]);
        $tramite->requerimientos()->createMany([
            [
                'descripcion' => 'Estar inscrito en RUNT',
            ],
            [
                'descripcion' => 'Pre asignación de placa (factura y manifiesto)',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'preasignacion_placa',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Formato único de solicitud de trámite FUN, debidamente diligenciado',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'solicitud_fun',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Anexar Improntas en el FUN',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'improntas',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Copia de la cédula del propietario',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'cedula_ciudadania',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero, otorgado o suscrito en Colombia o en Consulados (debidamente autenticado)',
                'obligatorio' => false,
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'poder',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'SOAT (vigente)',
            ],
            [
                'descripcion' => 'Estar a paz y salvo en el SIMIT (propietario)',
            ],
            [
                'descripcion' => 'Impuestos al día',
            ],
            [
                'descripcion' => 'Poder especial o mandato',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'vehiculo' => 'CARRO', 'precio' => 146000],
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'vehiculo' => 'MOTO', 'precio' => 117000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'Pro desarrollo académico', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 30000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 90000],
        ]);

    }
}
