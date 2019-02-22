<?php

namespace App\Mail;

use App\Poll;
use App\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VoteMail extends Mailable
{
    use Queueable, SerializesModels;
    public $vote;
    public $poll;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Poll $poll, Vote $vote)
    {
        $this->poll = $poll;
        $this->vote = $vote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.votemail') // δημηιουργεί το mail από το viewlayout
                    ->subject($this->poll->name); // Στέλνει το mail με θέμα τον τίτλο της ψηφοφορίας
    }
}
