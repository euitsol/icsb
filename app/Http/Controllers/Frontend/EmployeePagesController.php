<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\AssinedOfficer;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Council;
use App\Models\MediaRoomCategory;
use App\Models\MemberType;
use App\Models\SecAndCeo;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class EmployeePagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $bsss = SecretarialStandard::where('deleted_at', null)->where('status', 1)->get();
        $memberPortal = SinglePages::where('frontend_slug', 'member-portal')->first();
        $studentPortal = SinglePages::where('frontend_slug', 'student-portal')->first();
        $studentPortal = SinglePages::where('frontend_slug', 'student-portal')->first();
        $facultyEvaluationSystem = SinglePages::where('frontend_slug', 'faculty-evaluation-system')->first();
        $publicationOthers = SinglePages::where('frontend_slug', 'others')->first();
        $policies = SinglePages::where('frontend_slug', 'policy')->first();
        $menu_acts = Act::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $councils = Council::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $totalVisitors = 50000 + Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', Carbon::today())->count();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
            'bsss' => $bsss,
            'memberPortal' => $memberPortal,
            'studentPortal' => $studentPortal,
            'facultyEvaluationSystem' => $facultyEvaluationSystem,
            'policies' => $policies,
            'publicationOthers' => $publicationOthers,
            'menu_acts' => $menu_acts,
            'councils' => $councils,
            'totalVisitors' => $totalVisitors,
            'todayVisitors' => $todayVisitors,
        ]);
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
    public function organogram(): View
    {
        return view('frontend.employee.organogram');

    }
    public function assinedOfficer(): View
    {
        $s['assined_officers'] = AssinedOfficer::where('deleted_at',null)->where('status',1)->orderBy('order_key','ASC')->get();
        return view('frontend.employee.assined_officer',$s);

    }
}
