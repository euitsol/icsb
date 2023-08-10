<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CsFirms extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }
}
