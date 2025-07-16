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
        //Traspaso de vehículo
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Formato único de Solicitud de Trámite FUN, Debidamente Diligenciado',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'fun',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),            
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Anexar Improntas en el FUN o en la Compraventa',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Estar inscritos en el Registro Único Nacional de Tránsito (RUNT) (Tanto el comprador como el vendedor)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Cédula de ciudadanía (comprador y vendedor)',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Licencia de Transito (Tarjeta de Propiedad, Copia por Ambas Caras)',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'tarjeta_propiedad',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Compraventa del Vehículo no mayor a 60 días de suscrita, totalmente diligenciada sin tachones ni enmendaduras y con las firmas de las partes (se sugiere autenticadas)',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'compraventa',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Paz y salvo del SIMIT (comprador y vendedor)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Paz y salvo de impuestos (comprador y vendedor)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'SOAT (Vigente)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Revisión Técnico Mecánica (Vigente)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Paz y salvo y sesión de derechos de la empresa',
            'vehiculo' => 'EMPRESA',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Cámara de comercio y NIT del propietario', 
            'vehiculo' => 'EMPRESA',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Improntas',
            'tipo' => 'ARCHIVO',
            'vehiculo' => 'EMPRESA',
            'file_metadata' => json_encode([
                'nombre' => 'improntas',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Contrato de mandato o poder especial, si el tramite lo realiza un tercero, otorgado ó suscrito en Colombia o en Consulados (debidamente autenticado)',
            'obligatorio' => false,
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'poder',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Soportes de pago TNS y CUPL',
        ]);


        //Levantamiento 
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Formato único de Solicitud de Trámite FUN, Debidamente Diligenciado',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'fun',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),            
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Anexar Improntas en el FUN',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Estar inscritos en el Registro Único Nacional de Tránsito (RUNT)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Fotocopia de la cédula de ciudadanía',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Copia de la cédula de ciudadanía del representante legal',
            'tipo' => 'ARCHIVO',
            'persona' => 'JURIDICA',
            'file_metadata' => json_encode([
                'nombre' => 'cedula_representante_legal',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Licencia de Transito (Tarjeta de Propiedad, Copia por Ambas Caras)',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'tarjeta_propiedad',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Carta de levantamiento de la prenda autenticada autenticada y cámara de comercio “si aplica”',
            'tipo' => 'ARCHIVO',
            'persona' => 'NATURAL',
            'file_metadata' => json_encode([
                'nombre' => 'carta_de_levantamiento',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Carta de levantamiento de la prenda autenticada y cámara de comercio “si aplica”',
            'persona' => 'JURIDICA',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'carta_de_levantamiento',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Cámara de comercio y NIT',
            'tipo' => 'ARCHIVO',
            'persona' => 'JURIDICA',
            'file_metadata' => json_encode([
                'nombre' => 'camara_comercio_nit',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Paz y salvo del SIMIT (Propietario)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Paz y salvo de impuestos',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'SOAT (Vigente)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Revisión Técnico Mecánica (Vigente)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Contrato de mandato o poder especial, si el tramite lo realiza un tercero, otorgado ó suscrito en Colombia o en Consulados (debidamente autenticado)',
            'tipo' => 'ARCHIVO',
            'obligatorio' => false,
            'file_metadata' => json_encode([
                'nombre' => 'poder',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Soportes de pago TNS y CUPL',
        ]);


        //Certificación de tradición y libertad 
        TramiteRequerimiento::create([
            'tramite_id' => 3,
            'descripcion' => 'Solicitud formal con los datos del vehículo (placa, marca de vehículo)',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'solicitud_certificado',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 3,
            'descripcion' => 'Soporte de pago TNS',
        ]);


        //Duplicado de placas de un vehículo automotor
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Formato único de Solicitud de Trámite FUN, Debidamente Diligenciado',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'fun',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),            
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Anexar Improntas en el FUN',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Estar inscrito en el Registro Único Nacional de Tránsito (RUNT)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Paz y salvo del SIMIT',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Paz y salvo de impuestos',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Fotocopia de la cédula de ciudadanía',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Licencia de Transito (Tarjeta de Propiedad, Copia por Ambas Caras)',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'tarjeta_propiedad',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'SOAT (Vigente)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Revisión Técnico Mecánica (Vigente)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Contrato de mandato o poder especial, si el tramite lo realiza un tercero, otorgado ó suscrito en Colombia o en Consulados',
            'tipo' => 'ARCHIVO',
            'obligatorio' => false,
            'file_metadata' => json_encode([
                'nombre' => 'poder',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Soportes de pago TNS y CUPL',
        ]);



        //Renovación de licencia
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Estar inscritos en el Registro Único Nacional de Tránsito (RUNT)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Examen médico del centro de reconocimiento',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'examen_medico',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Fotocopia de la cédula de ciudadanía',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Copia de la licencia de conducción anterior',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'licencia_anterior',
                'tipo' => 'pdf',
                'max_size' => 10485760, // 10MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Paz y salvo del SIMIT',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Soportes de pago TNS y CUPL',
        ]);
    }
}
