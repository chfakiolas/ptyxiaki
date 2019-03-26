<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Poll;

class EponMail extends Mailable
{
    use Queueable, SerializesModels;

    public $poll;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Poll $poll)
    {
        $this->poll = $poll;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.eponmail') // δημηιουργεί το mail από το viewlayout
                    ->subject($this->poll->name); // Στέλνει το mail με θέμα τον τίτλο της ψηφοφορίας
    }
}
