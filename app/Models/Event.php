<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Event extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function getType()
    {
        if ($this->type == 1) {
            return 'Online';
        } else {
            return 'Offline';
        }
    }
}
