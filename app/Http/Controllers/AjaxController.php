<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AjaxController extends Controller
{

    public function __construct() {
        return $this->middleware('auth');
    }
    public function memberInfo($id): JsonResponse
    {
        $member = Member::findOrFail($id);
        return response()->json($member);
    }
}