<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CouncilMember extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function council(){
        return $this->belongsTo(Council::class, 'council_id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function council_member_type(){
        return $this->belongsTo(CouncilMemberType::class, 'cmt_id');
    }
}
