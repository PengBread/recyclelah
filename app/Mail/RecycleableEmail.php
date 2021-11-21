<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecycleableEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $title;
    public $description;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $title, $description)
    {
        $this->user = $user;
        $this->title = $title;
        $this->description = $description;
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
            'description' => $this->description,
        ];

        return $this->markdown('emails.RecycleableEmail')
            ->subject($this->title)
            ->from('recyclelahFYP@gmail.com', 'Recycle-Lah Team')
            ->to($this->user->email)
            ->with('body', $body);
    }
}