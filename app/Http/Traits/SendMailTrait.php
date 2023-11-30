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
        $members = Member::where('notify_email', 1)->latest()->limit(10)->get();
        foreach ($members as $member) {
            if(isset($member->email) && $member->email != null && $member->email != ''){
                $delay = now()->addSeconds($key * 20);
                // SendMemberEmail::dispatch($member->email, $data)->delay($delay);
                SendMemberEmail::dispatch('aksohag16@gmail.com', $data)->delay($delay);
            }
        }
    }
    public function send_custom_email($mail, $subject, $to){
        if(is_array($to)){
            foreach($to as $to_mail){
                Mail::to($to_mail)->send(new FeedBackMail($mail, $subject));
            }
        }else{
            Mail::to($to)->send(new FeedBackMail($mail, $subject));
        }

    }

}
