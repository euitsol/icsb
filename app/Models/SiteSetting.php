<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends BaseModel
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'env_key'];

    public $guarded = [];
}
