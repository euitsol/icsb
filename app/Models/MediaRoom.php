<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class MediaRoom extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public $timestamps = true;
    public function cat()
    {
        return $this->belongsTo(MediaRoomCategory::class, 'category_id');
    }
}
