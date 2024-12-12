<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class AssinedOfficer extends BaseModel
{
    use HasFactory;

    public $guarded = [];

    public function branch()
    {
        return $this->belongsTo(IcsbBranch::class);
    }
}