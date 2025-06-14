<?php

namespace App\Services;

use App\Mail\EnviarReciboDePago;
use App\Mail\EnviarCertificado;
use App\Mail\SolicitudAceptada;
use App\Mail\SolicitudRechazada;
use App\Mail\VerificarCorreo;

use Illuminate\Support\Facades\Mail;
use App\Jobs\SendMailJob;


class MailService
{
    public function sendReciboDePago($solicitud, $attachments)
    {
        SendMailJob::dispatch(EnviarReciboDePago::class, $solicitud->usuario->email, [$solicitud, $attachments]);
    }
    public function sendCertificado($solicitud, $attachments)
    {
        SendMailJob::dispatch(EnviarCertificado::class, $solicitud->usuario->email, [$solicitud, $attachments]);
    }
    public function sendSolicitudAceptada($solicitud)
    {
        SendMailJob::dispatch(SolicitudAceptada::class, $solicitud->usuario->email, [$solicitud]);
    }
    public function sendSolicitudRechazada($solicitud, $motivo)
    {
        SendMailJob::dispatch(SolicitudRechazada::class, $solicitud->usuario->email, [$solicitud, $motivo]);
    }
    public function sendUserVerification($usuario)
    {
        SendMailJob::dispatch(SolicitudAceptada::class, $usuario->email, [$usuario]);
    }
}
