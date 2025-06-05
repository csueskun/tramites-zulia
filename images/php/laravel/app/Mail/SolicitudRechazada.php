<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class SolicitudRechazada extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud;
    public $motivo;

    /**
     * Create a new message instance.
     */
    public function __construct($solicitud, $motivo)
    {
        $this->solicitud = $solicitud;
        $this->motivo = $motivo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitud Rechazada - Radicado - ' . $this->solicitud->radicado,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.solicitud-rechazada',
            with: [
                'nombres' => $this->solicitud->usuario->nombre_completo,
                'radicado' => $this->solicitud->radicado,
                'fecha' => $this->solicitud->created_at->format('d/m/Y'),
                'tramite' => $this->solicitud->tramite->nombre,
                'motivo' => $this->motivo,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
