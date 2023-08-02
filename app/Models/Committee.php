<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Committee extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function committe_type(){
        return $this->belongsTo(CommitteeType::class, 'committee_type');
    }
    public function committe_members(){
        return $this->hasMany(CommitteeMember::class, 'committee_id');
    }
}
