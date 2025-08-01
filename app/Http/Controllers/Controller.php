<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Visitor;

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

    public function sendSmsSingle($mobile,$text)
    {
        $url = "https://portal.adnsms.com/api/v1/secure/send-sms";
        $apiKey = env("ADN_SMS_KEY");
        $apiSecret = env("ADN_SMS_SECRET");

        $response = Http::post($url, [
            'api_key' => $apiKey,
            'api_secret' => $apiSecret,
            'request_type' => 'SINGLE_SMS',
            'message_type' => 'UNICODE',
            'mobile' => $mobile,
            'message_body' => $text,
        ]);
        return $response->json();
    }
    public function sendSmsBulk($mobile,$text, $title)
    {
        $url = "https://portal.adnsms.com/api/v1/secure/send-sms";
        $apiKey = env("ADN_SMS_KEY");
        $apiSecret = env("ADN_SMS_SECRET");

        $response = Http::post($url, [
            'api_key' => $apiKey,
            'api_secret' => $apiSecret,
            'request_type' => 'GENERAL_CAMPAIGN',
            'message_type' => 'UNICODE',
            'mobile' => $mobile,
            'message_body' => $text,
            'isPromotional' => 0,
            'campaign_title' => $title,
        ]);
        return $response->json();
    }

    public function getVisitorStats()
    {
        // Total visitors - cached for 24 hours
        $totalVisitors = Cache::remember('total_visitors', now()->addHours(24), function () {
            return 50000 + Visitor::count();
        });

        // Today's visitors - cached for 5 minutes with date-specific key
        $todayVisitors = Cache::remember('today_visitors_'.now()->toDateString(), now()->addMinutes(5), function () {
            return Visitor::whereBetween('created_at', [
                now()->startOfDay(),
                now()->endOfDay()
            ])->count();
        });

        return [
            'totalVisitors' => $totalVisitors,
            'todayVisitors' => $todayVisitors
        ];
    }


}
