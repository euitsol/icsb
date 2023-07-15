<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\View\View;

class HomePageController extends Controller
{
    //

    public function index(): View
    {
        $n['services'] = Service::get();
        return view('frontend.home',$n);
    }
}
