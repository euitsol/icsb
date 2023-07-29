<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Catch_;

class Blog extends BaseModel
{
    use HasFactory;

    public $guarded = [];
    public function cat()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
