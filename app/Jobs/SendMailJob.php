<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $memberMailable;
    protected $listBooks;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($memberMailable, $listBooks)
    {
        $this->memberMailable = $memberMailable;
        $this->listBooks = $listBooks;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = "Please return the following books for club DFbook: " . implode(', ', $this->listBooks);
        Mail::to($this->memberMailable)->send(new \App\Mail\OverDueMail($message));
    }
}
