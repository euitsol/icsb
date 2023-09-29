<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Member;

class DashboardController extends Controller
{
    //

    public function index(): View
    {
        $memberNames = Member::pluck('name')->toArray();

        return view('backend.dashboard.dashboard', ['memberNames' => $memberNames]);
    }
}
