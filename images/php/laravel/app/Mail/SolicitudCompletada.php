<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class SolicitudCompletada extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud;

    /**
     * Create a new message instance.
     */
    public function __construct($solicitud)
    {
        $this->solicitud = $solicitud;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitud Completada - Radicado - ' . $this->solicitud->radicado,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $with = [
            'nombres' => $this->solicitud->usuario->nombre_completo,
            'radicado' => $this->solicitud->radicado,
            'fecha' => $this->solicitud->created_at->format('d/m/Y'),
            'tramite' => $this->solicitud->tramite->nombre,
            'nota' => '', 
        ];
        if ($this->solicitud->tramite_id == 1) {
            $with['nota'] = 'Traer los documentos originales en físico.';
        }
        return new Content(
            view: 'emails.solicitud-completada',
            with: $with,
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
