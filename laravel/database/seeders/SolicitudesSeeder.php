<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Solicitud;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 12; $i++) {
            Solicitud::create([
                'usuario_id' => 2,
                'estado' => 'EN REVISION',
                'asunto' => ['TPVA', 'LLGVA', 'CLTVA', 'DPVA', 'RLC'][array_rand(['TPVA', 'LLGVA', 'CLTVA', 'DPVA', 'RLC'])],
                'fecha_aprobacion' => now()->addDays($i),
                'radicado' => 'RAD' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'comentario' => 'Comentario ' . $i,
            ]);
        }
    }
}
