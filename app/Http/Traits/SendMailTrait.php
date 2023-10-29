<?php

namespace App\Http\Traits;

use App\Jobs\SendMemberEmail;
use App\Models\Member;
use Illuminate\Database\Schema\Blueprint;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedBackMail;

trait SendMailTrait{

    public function send_member_email($data){
        $members = Member::where('notify_email', 1)->latest()->get();
        foreach ($members as $member) {
            if(isset($member->email) && $member->email != null && $member->email != ''){
                SendMemberEmail::dispatch($member->email, $data)->delay(now()->addSeconds(60));
            }
        }
    }
    public function send_feedback_email($mail, $subject, $to){
        $to = 'shariful.euitsols@gmail.com';
        Mail::to($to)->send(new FeedBackMail($mail, $subject));
    }
    public function send_admin_email($mail, $subject, $to){
        $to = 'shariful.euitsols@gmail.com';
        Mail::to($to)->send(new FeedBackMail($mail, $subject));
    }

}
