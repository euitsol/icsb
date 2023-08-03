<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\CommitteeType;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class MediaRoomPagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = BlogCategory::with('blogs')->where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
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
    public function cat_all($slug): View
    {
        $s['cat'] = BlogCategory::with('blogs')->where('slug',$slug)->where('deleted_at', null)->where('status','1')->first();
        $s['media_rooms'] = Blog::where('category_id',$s['cat']->id)->where('deleted_at', null)->where('permission','1')->latest()->get();
        return view('frontend.blog.blogs',$s);
    }
}
