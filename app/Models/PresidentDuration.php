<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class PresidentDuration extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function president(){
        return $this->belongsTo(President::class, 'president_id');
    }
}
