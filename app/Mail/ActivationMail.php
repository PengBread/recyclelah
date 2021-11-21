<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = [
            'name' => $this->user->name,
            'url' => route('verification', ['id' => $this->user->userID]),
        ];
        
        return $this->markdown('emails.ActivationEmail')
            ->subject('Recycle-Lah - Welcome!')
            ->from('recyclelahFYP@gmail.com', 'Recycle-Lah Team')
            ->to($this->user->email)
            ->with('body', $body);
    }
}