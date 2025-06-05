<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Solicitud;
use App\Models\User;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::where('role', 'USER')->first();
        for ($i = 1; $i <= 12; $i++) {
            Solicitud::create([
                'usuario_id' => $user->id,
                'nombres' => $user->nombreCompleto,
                'identificacion' => $user->documento,
                'tipo_documento' => $user->tipo_documento,
                'email' => $user->email,
                'estado' => 'EN REVISION',
                'tramite_id' => rand(1, 5),
                'fecha_aprobacion' => now()->addDays($i),
                'radicado' => 'RAD' . str_pad($i, 4, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
