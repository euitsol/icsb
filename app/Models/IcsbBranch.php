<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class IcsbBranch extends BaseModel
{
    use HasFactory;

    public $guarded = [];

    public function officers()
    {
        return $this->hasMany(AssinedOfficer::class, 'branch_id', 'id')->orderBy('order_key', 'asc')->where('deleted_at', null)->where('status', 1);
    }
}