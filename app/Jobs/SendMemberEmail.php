<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\MemberMail;

class SendMemberEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email, $data;


    public function __construct($email, $data)
    {
        //
        $this->email = $email;
        $this->data = $data;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new MemberMail($this->data));
    }
}
