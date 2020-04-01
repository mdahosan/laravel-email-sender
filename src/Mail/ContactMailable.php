<?php

namespace Pondit\Contact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mailData['email_from'], $this->mailData['sender_name'])
                    ->subject($this->mailData['subject'])
                    ->replyTo($this->mailData['reply_mail'])
                    ->markdown('contact::contact.email')
                    ->with(['data'=>$this->mailData]);
    }
}
