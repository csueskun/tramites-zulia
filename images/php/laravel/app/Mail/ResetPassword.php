<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $usuario;
    private $token;

    /**
     * Create a new message instance.
     */
    public function __construct($usuario, $token)
    {
        $this->usuario = $usuario;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cambio de Contraseña',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $url = env('APP_URL') . "/reset-password?token={$this->token}&email=" . urlencode($this->usuario->email);
        return new Content(
            view: 'emails.password-reset',
            with: [
                'nombres' => $this->usuario->nombre_completo,
                'url' => $url,
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
