<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Enrollment; // Import your model

class ApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $enrollment;

    // Pass the enrollment data to the email
    public function __construct(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We Received Your Application! 🎓', // Friendly subject
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.application_received', // We will create this view next
        );
    }
}