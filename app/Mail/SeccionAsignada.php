<?php

namespace App\Mail;

use App\Models\Alumno;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SeccionAsignada extends Mailable
{
    use Queueable, SerializesModels;
    public $alumno;
    public $secciones;

    /**
     * Create a new message instance.
     */
    public function __construct(Alumno $alumno, $secciones)
    {
        $this->alumno = $alumno;
        $this->secciones = $secciones;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Seccion Asignada',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.seccion-asignada',
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
