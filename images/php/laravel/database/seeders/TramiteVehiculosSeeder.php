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
            'vehiculo' => config('enums.vehiculo_types')[1], // PARTICULAR
        ]);
        TramiteVehiculo::create([
            'tramite_id' => 1,
            'vehiculo' => config('enums.vehiculo_types')[5], // EMPRESA
        ]);
        TramiteVehiculo::create([
            'tramite_id' => 2,
            'vehiculo' => config('enums.vehiculo_types')[2], // MOTO
        ]);
        TramiteVehiculo::create([
            'tramite_id' => 2,
            'vehiculo' => config('enums.vehiculo_types')[3], // CARRO
        ]);
        foreach (config('enums.vehiculo_types') as $vehiculoType) {
            // TramiteVehiculo::create([
            //     'tramite_id' => 2,
            //     'vehiculo' => $vehiculoType,
            // ]);
        }
    }
}
