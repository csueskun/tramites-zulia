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
            'descripcion' => 'Formato único de solicitud de trámite FUN',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'fun',
                'tipo' => 'xls',
                'max_size' => 5242880, // 5MB
            ]),            
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Improntas en el FUN o en la compraventa y el comprador',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Registro Único Nacional de Tránsito (RUNT)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Cédula de ciudadanía (comprador y vendedor)',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Tarjeta de propiedad (Ambas caras)',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'tarjeta_propiedad',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Compraventa del vehículo totalmente diligenciada, sin tachones ni enmendaduras',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'compraventa',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
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
            'descripcion' => 'SOAT',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Técnico mecánica vigentes',
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
                'max_size' => 5242880, // 5MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 1,
            'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero',
            'obligatorio' => false,
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'poder',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);


        //Levantamiento 
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Formato único de solicitud de trámite FUN',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'fun',
                'tipo' => 'xls',
                'max_size' => 5242880, // 5MB
            ]),            
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Improntas en el FUN',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Registro Único Nacional de Tránsito (RUNT)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Fotocopia de la cédula de ciudadanía',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Fotocopia de tarjeta de propiedad',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'tarjeta_propiedad',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Carta de levantamiento de la prenda autenticada',
            'tipo' => 'ARCHIVO',
            'persona' => 'NATURAL',
            'file_metadata' => json_encode([
                'nombre' => 'carta_levante',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Improntas',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'improntas',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Carta de levantamiento de la prenda',
            'persona' => 'JURIDICA',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'carta_levante',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
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
                'max_size' => 5242880, // 5MB
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
            'descripcion' => 'SOAT',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Técnico mecánica vigentes',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 2,
            'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero',
            'tipo' => 'ARCHIVO',
            'obligatorio' => false,
            'file_metadata' => json_encode([
                'nombre' => 'poder',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);


        //Certificación de tradición y libertad 
        TramiteRequerimiento::create([
            'tramite_id' => 3,
            'descripcion' => 'Registro Único Nacional de Tránsito (RUNT)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 3,
            'descripcion' => 'Fotocopia de la cédula de ciudadanía',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 2MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 3,
            'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero',
            'obligatorio' => false,
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'poder',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);


        //Duplicado de tarjeta de propiedad
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Formato único de solicitud de trámite FUN',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'fun',
                'tipo' => 'xls',
                'max_size' => 5242880, // 5MB
            ]),            
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Improntas en el FUN',
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
                'max_size' => 5242880, // 2MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Fotocopia de tarjeta de propiedad',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'tarjeta_propiedad',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 2MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Improntas',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'improntas',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'SOAT',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Técnico mecánica vigentes',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 4,
            'descripcion' => 'Contrato de mandato o poder especial, si el trámite lo realiza un tercero',
            'tipo' => 'ARCHIVO',
            'obligatorio' => false,
            'file_metadata' => json_encode([
                'nombre' => 'poder',
                'tipo' => 'pdf',
                'max_size' => 5242880, // 5MB
            ]),
        ]);



        //Renovación de licencia
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Registro Único Nacional de Tránsito (RUNT)',
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Examen médico del centro de reconocimiento',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 2097154, // 2MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Fotocopia de la cédula de ciudadanía',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'cedula',
                'tipo' => 'pdf',
                'max_size' => 2097154, // 2MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Copia de la licencia de conducción anterior',
            'tipo' => 'ARCHIVO',
            'file_metadata' => json_encode([
                'nombre' => 'licencia_anterior',
                'tipo' => 'pdf',
                'max_size' => 2097154, // 2MB
            ]),
        ]);
        TramiteRequerimiento::create([
            'tramite_id' => 5,
            'descripcion' => 'Paz y salvo del SIMIT',
        ]);
    }
}
