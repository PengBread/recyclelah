<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.SupportEmail')
            ->subject('Recycle-Lah - Feedback Email')
            ->from('recyclelahfyp@gmail.com', 'Recycle-Lah User')
            ->to('pengbreadpersonal@gmail.com', 'Recycle-Lah Team')
            ->with('body', $this->body);
    }
}