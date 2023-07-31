<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Models\MemberType;
use App\Models\Blog;
use Illuminate\View\View;
class BlogPagesController extends Controller
{
    //

    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
        ]);
    }
    public function blogs(): View
    {
        $s['blogs'] = Blog::where('deleted_at', null)->where('permission','1')->latest()->get();
        return view('frontend.blog.blogs',$s);
    }
    public function view($slug): View
    {
        $s['blog'] = Blog::where('deleted_at', null)->where('permission','1')->where('slug',$slug)->first();
        return view('frontend.blog.view',$s);
    }
}
