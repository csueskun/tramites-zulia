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
                'descripcion' => 'Estar inscrito en RUNT',
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
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Tarjeta propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura de compra carrocería y Ficha de homologación',
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
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
            ['vehiculo' => 'REMOLQUE'],
        ]);
        $tramite->personas()->createMany([
            ['persona' => 'NATURAL'],
            ['persona' => 'JURIDICA'],
        ]);
        // TODO: Verify if items prices are the same for all vehicle types
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
                'descripcion' => 'Estar inscrito en RUNT',
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
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Tarjeta propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura de compra carrocería y Ficha de homologación',
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
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
            ['vehiculo' => 'REMOLQUE'],
        ]);
        $tramite->personas()->createMany([
            ['persona' => 'NATURAL'],
            ['persona' => 'JURIDICA'],
        ]);
        // TODO: Verify if items prices are the same for all vehicle types
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
                'descripcion' => 'Estar inscrito en RUNT',
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
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Tarjeta propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura compra debidamente legalizada',
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
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
            ['vehiculo' => 'REMOLQUE'],
        ]);
        $tramite->personas()->createMany([
            ['persona' => 'NATURAL'],
            ['persona' => 'JURIDICA'],
        ]);
        // TODO: Verify if items prices are the same for all vehicle types
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 292000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);


        //CONVERSIÓN A GAS NATURAL
        $tramite = Tramite::create([
            'nombre' => 'Conversión a gas natural',
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
                'descripcion' => 'Estar inscrito en RUNT',
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
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Tarjeta propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura compra debidamente legalizada',
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
                'descripcion' => 'Transformación (si cambia de gasolina a diésel o viceversa)',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'transformacion',
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
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
            ['vehiculo' => 'REMOLQUE'],
        ]);
        $tramite->personas()->createMany([
            ['persona' => 'NATURAL'],
            ['persona' => 'JURIDICA'],
        ]);
        // TODO: Verify if items prices are the same for all vehicle types
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
                'descripcion' => 'Estar inscrito en RUNT',
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
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Tarjeta propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura compra debidamente legalizada',
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
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
            ['vehiculo' => 'REMOLQUE'],
        ]);
        $tramite->personas()->createMany([
            ['persona' => 'NATURAL'],
            ['persona' => 'JURIDICA'],
        ]);
        // TODO: Verify if items prices are the same for all vehicle types
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
                'descripcion' => 'Estar inscrito en RUNT',
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
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Tarjeta propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura compra debidamente legalizada',
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
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
            ['vehiculo' => 'REMOLQUE'],
        ]);
        $tramite->personas()->createMany([
            ['persona' => 'NATURAL'],
            ['persona' => 'JURIDICA'],
        ]);
        // TODO: Verify if items prices are the same for all vehicle types
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
                'descripcion' => 'Estar inscrito en RUNT',
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
                    'nombre' => 'tarjeta_propiedad',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Tarjeta propiedad ambas caras',
                'tipo' => 'ARCHIVO',
                'file_metadata' => json_encode([
                    'nombre' => 'tarjeta_propiedad_copia',
                    'tipo' => 'pdf',
                    'max_size' => 10485760,
                ]),
            ],
            [
                'descripcion' => 'Factura compra debidamente legalizada',
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
                'descripcion' => 'Paz y salvo de impuestos de vehículo',
            ],
            [
                'descripcion' => 'Soporte de pago TNS y CUPL',
            ],
        ]);
        $tramite->vehiculos()->createMany([
            ['vehiculo' => 'CARRO'],
            ['vehiculo' => 'MOTO'],
            ['vehiculo' => 'REMOLQUE'],
        ]);
        $tramite->personas()->createMany([
            ['persona' => 'NATURAL'],
            ['persona' => 'JURIDICA'],
        ]);
        // TODO: Verify if items prices are the same for all vehicle types
        $tramite->items()->createMany([
            ['nombre' => 'Derecho de trámite', 'descripcion' => '', 'precio' => 292000],
            ['nombre' => 'Sustrato de lámina', 'descripcion' => '', 'precio' => 41000],
            ['nombre' => 'Estampilla electrificación', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 3000],
            ['nombre' => 'Pro Hospital', 'descripcion' => '', 'tipo' => 'ESTAMPILLA', 'precio' => 6000],
            ['nombre' => 'RUNT (CUPL)', 'descripcion' => '', 'precio' => 38400],
        ]);

    }
}
