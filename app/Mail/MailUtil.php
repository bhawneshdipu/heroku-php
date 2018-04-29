<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailUtil extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject_name;
    public $body;
    public function __construct($s,$b)
    {
        $this->subject_name=$s;
        $this->body=$b;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject($this->subject_name)->view('Email.email')->with([
            'body'=>$this->body
        ]);

    }
}