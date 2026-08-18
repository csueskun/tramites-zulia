<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CambiarEstadoJob implements ShouldQueue
{
    use Queueable;

    protected $solicitud_id;
    protected $radicado;
    protected $estado;

    /**
     * Create a new job instance.
     */
    public function __construct($solicitud_id, $radicado, $estado)
    {
        $this->solicitud_id = $solicitud_id;
        $this->radicado = $radicado;
        $this->estado = $estado;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $radicacionService = app()->make(\App\Services\RadicacionVentanillaService::class);
        $radicacionService->cambiarEstado($this->solicitud_id, $this->radicado, $this->estado);
    }
}