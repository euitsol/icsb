<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CsFirms;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class CsFirmsController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['cs_firms'] = CsFirms::with('member')->where('deleted_at',null)->latest()->get();
        return view('backend.member.cs_firms.index',$s);
    }
    public function create(): View
    {
        $s['members'] = Member::where('deleted_at', null)->where('status',1)->latest()->get();
        return view('backend.member.cs_firms.create',$s);
    }
}
