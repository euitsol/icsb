<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Notice extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function category(){
        return $this->belongsTo(NoticeCategory::class, 'cat_id');
    }
}
