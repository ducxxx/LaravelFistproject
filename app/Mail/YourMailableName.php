<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class YourMailableName extends Mailable
{
    use Queueable, SerializesModels;
    public $member;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        $this->member = $member;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $member = $this->member;
        return $this->view('pages.mail.OverDueEmail', compact('member'));
    }
}
