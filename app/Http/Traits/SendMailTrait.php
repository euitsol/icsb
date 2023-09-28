<?php

namespace App\Http\Traits;

use App\Jobs\SendMemberEmail;
use App\Models\Member;
use Illuminate\Database\Schema\Blueprint;

trait SendMailTrait{

    public function send_member_email($data){
        $members = Member::where('notify_email', 1)->latest()->get();
        foreach ($members as $member) {
            if(isset($member->email) && $member->email != null && $member->email != ''){
                SendMemberEmail::dispatch($member->email, $data)->delay(now()->addSeconds(60));
            }
        }
    }

}
