<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UploadAnexosJob implements ShouldQueue
{
    use Queueable;

    protected $referencia;
    protected $radicado;
    protected $filePaths;

    /**
     * Create a new job instance.
     */
    public function __construct($referencia, $radicado, $filePaths)
    {
        $this->referencia = $referencia;
        $this->radicado = $radicado;
        $this->filePaths = $filePaths;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $radicacionService = app()->make(\App\Services\RadicacionVentanillaService::class);
        $radicacionService->uploadAnexos($this->referencia, $this->radicado, $this->filePaths);
    }
}