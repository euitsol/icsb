<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function fileDelete($image)
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
    public function permissionDeclineFunction($modelData)
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
            $message = ' remove from featured successfully.';
        }else{
            $modelData->is_featured = '1';
            $message = ' added on featured successfully.';
        }
        $modelData->updated_by = auth()->user()->id;
        $modelData->save();

    }

    public function soft_delete($data){
        $data->deleted_at = Carbon::now();
        $data->deleted_by = auth()->user()->id;
        $data->save();

        return $data;
    }

    public function create_user($name, $email, $password = null, $role_id){
        if($password == null){
            $password = generateRandomPassword();
        }
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'password_hint' => $password,
            'role_id' => $role_id,
        ]);

        return $user;
    }


    public function edit_user($user_id, $name = null, $email = null, $password = null, $role_id = null){

        $user = User::findOrFail($user_id);

        if($name != null){
            $user->name = $name;
        }elseif($email != null){
            $user->email = $email;
        }elseif($password != null){
            $user->password = bcrypt($password);
        }elseif($role_id != null){
            $user->role_id = $role_id;
        }

        $user->save();

        return $user;
    }

}
