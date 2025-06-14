<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Queueable;

    protected $mailClass;
    protected $recipient;
    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct($mailClass, $recipient, $data)
    {
        $this->mailClass = $mailClass;
        $this->recipient = $recipient;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->recipient)->send(new $this->mailClass(...$this->data));
    }
}
