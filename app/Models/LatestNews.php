<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class LatestNews extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    protected $table = 'latest_newses';
}
