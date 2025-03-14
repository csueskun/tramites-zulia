<?php

namespace App\Services;

use App\Mail\EnviarReciboDePago;
use App\Mail\EnviarCertificado;
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
}
