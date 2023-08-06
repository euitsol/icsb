<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function media_rooms(){
        return $this->hasMany(Blog::class, 'category_id');
    }
}
