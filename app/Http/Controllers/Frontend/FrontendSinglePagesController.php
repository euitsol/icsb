<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Event;
use App\Models\MemberType;
use App\Models\NationalAward;
use App\Models\SinglePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class FrontendSinglePagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
        ]);
    }
    public function frontend($fs): View
    {

        $s['single_page'] = SinglePages::where('frontend_slug', $fs)->first();
        if($s['single_page']->frontend_slug == 'vision')
        {
            $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
            return view('frontend.about.vision',$s);
        }
        if($s['single_page']->frontend_slug == 'mission')
        {
            $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
            return view('frontend.about.mission',$s);
        }
        if($s['single_page']->frontend_slug == 'objectives')
        {
            $s['blogs'] = Blog::where('deleted_at', null)->where('permission','1')->where('is_featured','1')->latest()->get();
            $s['events'] = Event::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
            return view('frontend.about.objectives',$s);
        }
        if($s['single_page']->frontend_slug == 'exam-schedule')
        {
            return view('frontend.examination.exam_schedule',$s);
        }
        if($s['single_page']->frontend_slug == 'job-placement')
        {
            return view('frontend.members.job_placement',$s);
        }
    }
}