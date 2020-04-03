<?php

namespace Pondit\Mailer\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PonditMailable extends Mailable
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

        return  $this->from($this->mailData['email_from'], $this->mailData['sender_name'])
                ->subject($this->mailData['subject'])
                ->replyTo($this->mailData['reply_mail'])
                ->markdown('mailer::emails.promotion')
                ->with(['data'=>$this->mailData]);
    }

    public function failed(Exception $exception)
    {
        Log::error($exception->getMessage());
    }

}
