<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function imageDelete($image): void
    {
        if ($image) {
            Storage::delete('public/' . $image);
        }
    }
    public function statusChange($modelData): void
    {
        if($modelData->status == 1){
            $modelData->status = 0;
        }else{
            $modelData->status = 1;
        }
        $modelData->updated_by = auth()->user()->id;
        $modelData->save();
    }
    public function featuredChange($modelData): void
    {
        if($modelData->is_featured == 1){
            $modelData->is_featured= '0';
        }else{
            $modelData->is_featured = '1';
        }
        $modelData->updated_by = auth()->user()->id;
        $modelData->save();
    }

}
