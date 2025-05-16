<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class EnviarCertificado extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud;
    public $attachment;

    /**
     * Create a new message instance.
     */
    public function __construct($solicitud, $attachment)
    {
        $this->solicitud = $solicitud;
        $this->attachment = $attachment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Certificado - Solicitud ' . $this->solicitud->radicado,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.certificado',
            with: [
                'nombres' => $this->solicitud->usuario->nombre_completo,
                'radicado' => $this->solicitud->radicado,
                'fecha' => $this->solicitud->created_at->format('d/m/Y'),
                'tramite' => $this->solicitud->tramite->nombre,
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
        return [
            Attachment::fromPath(storage_path($this->attachment))
                ->as('certificado.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
