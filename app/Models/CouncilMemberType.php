<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CouncilMemberType extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function council_member_type_members(){
        return $this->hasMany(CouncilMember::class, 'cmt_id');
    }
}
