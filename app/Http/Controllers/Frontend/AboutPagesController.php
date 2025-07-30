<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\MediaRoom;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\Council;
use App\Models\Event;
use Illuminate\View\View;
use App\Models\MemberType;
use App\Models\NationalAward;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\WWCS;
use App\Models\Visitor;
use Illuminate\Support\Carbon;

class AboutPagesController extends Controller
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
    public function faq(): View
    {
        $s['faqs']= Faq::where('deleted_at', null)->orderBy('order_key','ASC')->get();
        return view('frontend.about.faq',$s);
    }
    public function wwcs(): View
    {
        $s['wwcss'] = WWCS::where('status',1)->where('deleted_at', null)->orderBy('order_key','ASC')->get();
        return view('frontend.about.wwcs',$s);
    }
    // public function icsb_profile(): View
    // {
    //     $s['wwcss'] = WWCS::where('status',1)->where('deleted_at', null)->latest()->get();
    //     return view('frontend.about.icsb_profile',$s);
    // }

}
