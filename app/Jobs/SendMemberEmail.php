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

    public $member, $title, $details;


    public function __construct($member, $title, $details)
    {
        //
        $this->member = $member;
        $this->title = $title;
        $this->details = $details;
    }

    public function handle()
    {
        Mail::to($this->member->email)->send(new MemberMail($this->title, $this->details));
    }
}
