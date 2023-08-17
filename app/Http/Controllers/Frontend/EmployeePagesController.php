<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\MediaRoomCategory;
use App\Models\MemberType;
use App\Models\SecAndCeo;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class EmployeePagesController extends Controller
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
    public function sec_and_ceo(): View
    {
        $s['sec_and_ceo'] = SecAndCeo::with(['durations','member'])
                        ->where('status',1)
                        ->where('deleted_at',null)
                        ->first();
        return view('frontend.employee.sec_and_ceo',$s);
    }
    public function past_sec_and_ceos(): View
    {
        $s['p_sec_and_ceos'] = SecAndCeo::with(['durations','member'])
                        ->where('status',0)
                        ->where('deleted_at',null)
                        ->get();
        return view('frontend.employee.past_sec_and_ceos',$s);
    }
    public function singlePSC($slug): View
    {
        $s['sec_and_ceo'] = SecAndCeo::with(['durations','member'])
                        ->where('slug',$slug)
                        ->where('deleted_at',null)
                        ->first();
        return view('frontend.employee.sec_and_ceo',$s);
    }
}
