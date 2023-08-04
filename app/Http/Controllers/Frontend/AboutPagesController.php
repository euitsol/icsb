<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\View\View;
use App\Models\MemberType;
use App\Models\NationalAward;
use App\Models\WWCS;

class AboutPagesController extends Controller
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
    public function faq(): View
    {
        $s['faqs']= Faq::where('deleted_at', null)->latest()->get();
        return view('frontend.about.faq',$s);
    }
    public function wwcs(): View
    {
        $s['wwcss'] = WWCS::where('status',1)->where('deleted_at', null)->latest()->get();
        return view('frontend.about.wwcs',$s);
    }
    public function icsb_profile(): View
    {
        $s['wwcss'] = WWCS::where('status',1)->where('deleted_at', null)->latest()->get();
        return view('frontend.about.icsb_profile',$s);
    }
    // public function objectives(): View
    // {
    //     $s['blogs'] = Blog::where('deleted_at', null)->where('permission','1')->where('is_featured','1')->latest()->get();
    //     $s['events'] = Event::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
    //     return view('frontend.about.objectives',$s);
    // }
    // public function vision(): View
    // {
    //     $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
    //     return view('frontend.about.vision',$s);
    // }
    // public function mission(): View
    // {
    //     $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
    //     return view('frontend.about.mission',$s);
    // }

}
