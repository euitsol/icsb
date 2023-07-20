<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function imageDelete($image)
    {
        if ($image) {
            Storage::delete('public/' . $image);
        }
    }
    public function permissionAcceptFunction($modelData)
    {
        $modelData->permission = '1';
        $modelData->updated_by = auth()->user()->id;
        $modelData->save();
    }
    public function permissionDeclaineFunction($modelData)
    {
        $modelData->permission = '-1';
        $modelData->updated_by = auth()->user()->id;
        $modelData->save();
    }
    public function statusChange($modelData)
    {
        if($modelData->status == 1){
            $modelData->status = 0;
        }else{
            $modelData->status = 1;
        }
        $modelData->updated_by = auth()->user()->id;
        $modelData->save();
    }
    public function featuredChange($modelData)
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
