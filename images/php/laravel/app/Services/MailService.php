<?php

namespace App\Services;

use App\Mail\EnviarReciboDePago;
use App\Mail\EnviarCertificado;
use App\Mail\SolicitudAceptada;
use App\Mail\SolicitudRechazada;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendReciboDePago($solicitud, $attachments)
    {
        Mail::to($solicitud->usuario->email)->send(new EnviarReciboDePago($solicitud, $attachments));
    }
    public function sendCertificado($solicitud, $attachments)
    {
        Mail::to($solicitud->usuario->email)->send(new EnviarCertificado($solicitud, $attachments));
    }
    public function sendSolicitudAceptada($solicitud)
    {
        Mail::to($solicitud->usuario->email)->send(new SolicitudAceptada($solicitud));
    }
    public function sendSolicitudRechazada($solicitud, $motivo)
    {
        Mail::to($solicitud->usuario->email)->send(new SolicitudRechazada($solicitud, $motivo));
    }
    public function sendUserVerification($usuario)
    {
        Mail::to($usuario->email)->send(new SolicitudAceptada($usuario));
    }
}
