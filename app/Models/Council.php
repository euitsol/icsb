<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Council extends BaseModel
{
    use HasFactory;

    public $guarded = [];

    public function council_members(){
        return $this->hasMany(CouncilMember::class, 'council_id');
    }
}
