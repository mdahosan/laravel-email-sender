<?php

namespace Pondit\Mailer\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Pondit\Mailer\Mail\PonditMailable;
use Exception;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emails = str_replace("\r\n",",", $this->details['email_to']);
        $explodedEmails = explode(',', $emails);
        Mail::to($explodedEmails)->send(new PonditMailable($this->details));

    }

    public function failed(Exception $e)
    {
        Log::error($e->getMessage());
    }

}
