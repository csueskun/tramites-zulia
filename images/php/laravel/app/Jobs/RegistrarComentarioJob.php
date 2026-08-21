<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class RegistrarComentarioJob implements ShouldQueue
{
    use Queueable;

    protected $referencia;
    protected $radicado;
    protected $comentario;

    /**
     * Create a new job instance.
     */
    public function __construct($referencia, $radicado, $comentario)
    {
        $this->referencia = $referencia;
        $this->radicado = $radicado;
        $this->comentario = $comentario;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $radicacionService = app()->make(\App\Services\RadicacionVentanillaService::class);
        $radicacionService->registrarComentario($this->referencia, $this->radicado, $this->comentario);
    }
}