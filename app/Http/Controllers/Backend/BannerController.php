<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BannerController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
}
