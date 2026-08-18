<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UploadDocumentoPrincipalJob implements ShouldQueue
{
    use Queueable;

    protected $referencia;
    protected $radicado;
    protected $filePath;

    /**
     * Create a new job instance.
     */
    public function __construct($referencia, $radicado, $filePath)
    {
        $this->referencia = $referencia;
        $this->radicado = $radicado;
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $radicacionService = app()->make(\App\Services\RadicacionVentanillaService::class);
        $radicacionService->uploadDocumentoPrincipal($this->referencia, $this->radicado, $this->filePath);
    }
}