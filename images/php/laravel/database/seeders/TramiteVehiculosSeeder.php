<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TramiteVehiculo;

class TramiteVehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TramiteVehiculo::create([
            'tramite_id' => 1,
            'vehiculo' => 'PARTICULAR',
        ]);
        TramiteVehiculo::create([
            'tramite_id' => 1,
            'vehiculo' => 'EMPRESA',
        ]);
        TramiteVehiculo::create([
            'tramite_id' => 2,
            'vehiculo' => 'CARRO',
        ]);
        TramiteVehiculo::create([
            'tramite_id' => 2,
            'vehiculo' => 'MOTO',
        ]);
        TramiteVehiculo::create([
            'tramite_id' => 4,
            'vehiculo' => 'CARRO',
        ]);
        TramiteVehiculo::create([
            'tramite_id' => 4,
            'vehiculo' => 'MOTO',
        ]);
    }
}
