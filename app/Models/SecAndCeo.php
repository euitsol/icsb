<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class SecAndCeo extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function durations(){
        return $this->hasMany(SecAndCeoDuration::class, 'sc_id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }
}
