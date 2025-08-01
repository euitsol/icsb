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
use App\Models\Visitor;
use App\Models\PopUp;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\Response;

class HomePageController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $bsss = SecretarialStandard::where('deleted_at', null)->where('status', 1)->get();
        $memberPortal = SinglePages::where('frontend_slug', 'member-portal')->first();
        $studentPortal = SinglePages::where('frontend_slug', 'student-portal')->first();
        $studentLogin = SinglePages::where('frontend_slug', 'student-login')->first();
        $memberLogin  = SinglePages::where('frontend_slug', 'member-login')->first();
        $examRegistration  = SinglePages::where('frontend_slug', 'exam-registration')->first();
        $onlineAdmission  = SinglePages::where('frontend_slug', 'online-admission')->first();
        $facultyEvaluationSystem = SinglePages::where('frontend_slug', 'faculty-evaluation-system')->first();
        $publicationOthers = SinglePages::where('frontend_slug', 'others')->first();
        $policies = SinglePages::where('frontend_slug', 'policy')->first();
        $menu_acts = Act::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $councils = Council::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        ['totalVisitors' => $totalVisitors, 'todayVisitors' => $todayVisitors] = $this->getVisitorStats();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
            'bsss' => $bsss,
            'memberPortal' => $memberPortal,
            'studentPortal' => $studentPortal,
            'studentLogin' => $studentLogin,
            'memberLogin' => $memberLogin,
            'examRegistration' => $examRegistration,
            'onlineAdmission' => $onlineAdmission,
            'facultyEvaluationSystem' => $facultyEvaluationSystem,
            'policies' => $policies,
            'publicationOthers' => $publicationOthers,
            'menu_acts' => $menu_acts,
            'councils' => $councils,
            'totalVisitors' => $totalVisitors,
            'todayVisitors' => $todayVisitors,
        ]);
    }

    public function index(): View
    {
        $s['banner'] = Banner::with('images')->where('deleted_at', null)->where('status',1)->first();
        $s['media_rooms'] = MediaRoom::where('deleted_at', null)->where('permission','1')->where('is_featured','1')->orderBy('created_at','ASC')->get();
        $s['wwcss'] = WWCS::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        $s['events'] = Event::where('deleted_at', null)->where('is_featured','1')->where('status',1)->orderBy('event_start_time', 'ASC')->get();
        $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
        $s['national_connections'] = NationalConnection::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        $s['president'] = President::with(['durations','member'])->where('status',1)->where('deleted_at',null)->first();
        $s['home_bsss'] = SecretarialStandard::where('deleted_at', null)->where('is_featured','1')->where('status', 1)->get();
        $s['who_we_are'] = SinglePages::where('frontend_slug', 'who-we-are')->first();
        $s['pop_up'] = SinglePages::where('frontend_slug', 'pop-up')->first();
        $s['recent_videos'] = RecentVideo::where('status',1)->where('deleted_at',null)->latest()->get();
        $s['notice_cats'] = NoticeCategory::with('notices')->where('deleted_at',null)->where('status',1)->get();
        $s['notices'] = Notice::with('category')->where('deleted_at',null)->where('status',1)->orderBy('release_date', 'DESC')->limit(4)->get();
        $s['testimonials'] = Testimonial::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        $s['latest_newses'] = LatestNews::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        $s['banner_video'] = SinglePages::where('frontend_slug', 'banner-video')->first();
        if(isset(json_decode($s['banner_video']->saved_data)->{'upload-video'})){
            $file_path = json_decode($s['banner_video']->saved_data)->{'upload-video'};
            $file_path = storage_path('app/public/' . $file_path);
            if ($file_path != null && file_exists($file_path)) {
                $mimeType = mime_content_type($file_path);
                if (strpos($mimeType, 'video/') === 0) {
                    // It's a video
                    $s['banner_video']['fileType'] = 'video';
                } elseif (strpos($mimeType, 'image/') === 0) {
                    // It's an image
                    $s['banner_video']['fileType'] = 'image';
                } else {
                    // Unsupported file type, you can handle this case accordingly
                    abort(404);
                }
            }
        }






        $s['pop_ups'] = PopUp::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        return view('frontend.home',$s);
    }

    public function banner_video($url)
    {
        $file_path = base64_decode($url);
        $file_path = storage_path('app/public/'.$file_path);
        if($file_path != null){
            if(file_exists($file_path)){
                $fileContents = file_get_contents($file_path);
                $response = response($fileContents, 200);
                $response->header('Content-Type', 'video/mp4');
                return $response;
            }
        }
    }
}
