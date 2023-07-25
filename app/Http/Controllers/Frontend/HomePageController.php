<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\WWCS;
use App\Models\Event;
use App\Models\NationalAward;
use App\Models\NationalConnection;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function __construct() {
        $this->contact = Contact::where('deleted_at', null)->first();
        view()->share('contact', $this->contact);
    }

    public function index(): View
    {
        $s['banner'] = Banner::with('images')->where('deleted_at', null)->where('status',1)->first();
        $s['blogs'] = Blog::where('deleted_at', null)->where('is_featured','1')->latest()->get();
        $s['wwcss'] = WWCS::where('deleted_at', null)->where('status',1)->latest()->get();
        $s['events'] = Event::where('deleted_at', null)->where('status',1)->latest()->get();
        $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
        $s['national_connections'] = NationalConnection::where('deleted_at', null)->where('status',1)->latest()->get();
        return view('frontend.home',$s);
    }
}
