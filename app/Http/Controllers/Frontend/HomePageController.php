<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\MediaRoom;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use App\Models\Council;
use App\Models\WWCS;
use App\Models\Event;
use App\Models\LatestNews;
use App\Models\NationalAward;
use App\Models\NationalConnection;
use App\Models\MemberType;
use App\Models\Notice;
use App\Models\NoticeCategory;
use App\Models\President;
use App\Models\RecentVideo;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->get();
        $bsss = SecretarialStandard::where('deleted_at', null)->where('status', 1)->get();
        $memberPortal = SinglePages::where('frontend_slug', 'member-portal')->first();
        $studentPortal = SinglePages::where('frontend_slug', 'student-portal')->first();
        $studentPortal = SinglePages::where('frontend_slug', 'student-portal')->first();
        $facultyEvaluationSystem = SinglePages::where('frontend_slug', 'faculty-evaluation-system')->first();
        $publicationOthers = SinglePages::where('frontend_slug', 'others')->first();
        $menu_acts = Act::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $councils = Council::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
            'bsss' => $bsss,
            'memberPortal' => $memberPortal,
            'studentPortal' => $studentPortal,
            'facultyEvaluationSystem' => $facultyEvaluationSystem,
            'publicationOthers' => $publicationOthers,
            'menu_acts' => $menu_acts,
            'councils' => $councils,
        ]);
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $s['banner'] = Banner::with('images')->where('deleted_at', null)->where('status',1)->first();
        $s['media_rooms'] = MediaRoom::where('deleted_at', null)->where('permission','1')->where('is_featured','1')->latest()->get();
        $s['wwcss'] = WWCS::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        $s['events'] = Event::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
        $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
        $s['national_connections'] = NationalConnection::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        $s['president'] = President::with(['durations','member'])->where('status',1)->where('deleted_at',null)->first();
        $s['home_bsss'] = SecretarialStandard::where('deleted_at', null)->where('is_featured','1')->where('status', 1)->get();
        $s['single_page'] = SinglePages::where('frontend_slug', 'icsb-profile')->first();
        $s['recent_videos'] = RecentVideo::where('status',1)->where('deleted_at',null)->latest()->get();
        $s['notice_cats'] = NoticeCategory::with('notices')->where('deleted_at',null)->where('status',1)->get();
        $s['notices'] = Notice::with('category')->where('deleted_at',null)->where('status',1)->latest()->limit(4)->get();
        $s['testimonials'] = Testimonial::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        $s['latest_newses'] = LatestNews::where('deleted_at', null)->where('status',1)->orderBy('date','ASC')->get();
        return view('frontend.home',$s);
    }
}
