<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class PopUp extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    protected $table = 'pop_ups';
}
