<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Models\WWCS;

class WWCSController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {

        // $n['wwcss']= WWCS::where('deleted_at', null)->latest()->get();
        // return view('backend.world_wide_cs.index',$n);
        return view('backend.event.index');
    }
}
