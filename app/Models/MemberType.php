<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class MemberType extends BaseModel
{
    use HasFactory;

    public $guarded = [];

    public function members(){
        return $this->hasMany(Member::class, 'member_type');
    }
}
