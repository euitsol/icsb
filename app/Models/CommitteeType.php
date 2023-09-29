<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CommitteeType extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function committees(){
        return $this->hasMany(Committee::class, 'committee_type')->orderBy('order_key','ASC');
    }
}
