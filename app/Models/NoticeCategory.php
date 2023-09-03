<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class NoticeCategory extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function notices(){
        return $this->hasMany(Notice::class, 'cat_id');
    }
}
