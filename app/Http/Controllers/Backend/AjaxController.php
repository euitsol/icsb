<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\CouncilMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AjaxController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function memberInfo($id, $cmId = null): JsonResponse
    {
        if($cmId != null){
            $council = CouncilMember::findOrFail($cmId);
        }

        $member = Member::findOrFail($id);
        $member_id = member_id($member->id);
        $phone = json_decode($member->phone);

        return response()->json(['member'=>$member,'member_id'=>$member_id,'phone'=>$phone, 'council'=>$council ?? '',]);
    }
}
