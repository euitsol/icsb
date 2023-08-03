<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\CommitteeType;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class MediaRoomPagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
        ]);
    }
    public function mr_all(): View
    {
        $s['media_rooms'] = Blog::where('deleted_at', null)->where('permission','1')->latest()->get();
        return view('frontend.blog.blogs',$s);
    }
    public function view($slug): View
    {
        $s['media_room'] = Blog::where('deleted_at', null)->where('permission','1')->where('slug',$slug)->first();
        return view('frontend.blog.view',$s);
    }
}
