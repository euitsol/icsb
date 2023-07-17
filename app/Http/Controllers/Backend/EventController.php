<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $n['events']= Event::where('deleted_at', null)->latest()->get();
        return view('backend.event.index',$n);
    }
    public function create(): View
    {
        return view('backend.event.create');
    }
}
