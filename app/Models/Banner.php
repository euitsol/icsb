<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Banner extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function images()
    {
        return $this->hasMany(BannerImage::class);
    }
}
