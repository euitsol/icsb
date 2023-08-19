<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class SecAndCeoDuration extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function secretary_and_ceo(){
        return $this->belongsTo(SecAndCeo::class, 'sc_id');
    }
}
