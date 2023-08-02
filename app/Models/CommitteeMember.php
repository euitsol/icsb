<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function committe(){
        return $this->belongsTo(Committee::class, 'committee_id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function committe_member_type(){
        return $this->belongsTo(CommitteeMemberType::class, 'cmt_id');
    }
}
