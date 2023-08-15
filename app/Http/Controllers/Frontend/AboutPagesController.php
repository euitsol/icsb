<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MediaRoom;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\View\View;
use App\Models\MemberType;
use App\Models\NationalAward;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\WWCS;

class AboutPagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->get();
        $bsss = SecretarialStandard::where('deleted_at', null)->where('status', 1)->get();
        $memberPortal = SinglePages::where('frontend_slug', 'member-portal')->first();
        $studentPortal = SinglePages::where('frontend_slug', 'student-portal')->first();
        $studentPortal = SinglePages::where('frontend_slug', 'student-portal')->first();
        $facultyEvaluationSystem = SinglePages::where('frontend_slug', 'faculty-evaluation-system')->first();
        $publicationOthers = SinglePages::where('frontend_slug', 'others')->first();
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
        ]);
        return $this->middleware('auth');
    }
    public function faq(): View
    {
        $s['faqs']= Faq::where('deleted_at', null)->orderBy('order_key','ASC')->get();
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

}
