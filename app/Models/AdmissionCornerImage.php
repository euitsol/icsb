<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class AdmissionCornerImage extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    protected $table = 'admission_corner_image';
}
