<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailValid extends Mailable
{
    use Queueable, SerializesModels;

    private string $name;
    private string $body;
    public ?array $data;
    public $record;
    public $subject;
    /**
     * Create a new message instance.
     */
    public function __construct($record, $data)
    {
        $this->record = $record;
        // $this->subject = $subject;
        $this->data = $data;

        $this->subject = 'Undangan Wawancara dari Viscus Media Dharma';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // view: "emails.send-mail",
            markdown: 'emails.send-mail-valid',
            with: [
                'record' => $this->record,
                // 'subject' => $this->subject,
                'data' => $this->data
            ]
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