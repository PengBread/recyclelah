<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecycleableEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;
    public $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body, $title)
    {
        $this->body = $body;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.RecycleableEmail')
            ->subject($this->title)
            ->from('pengbreadpersonal@gmail.com', 'Recycle-Lah Team')
            ->to('recyclelahfyp@gmail.com', 'Recycle-Lah User')
            ->with('body', $this->body);
    }
}