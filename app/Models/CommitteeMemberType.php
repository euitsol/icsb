<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CommitteeMemberType extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function committe_member_type_members(){
        return $this->hasMany(CommitteeMember::class, 'cmt_id');
    }
}
