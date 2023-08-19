<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class President extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function durations(){
        return $this->hasMany(PresidentDuration::class, 'president_id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }

}
