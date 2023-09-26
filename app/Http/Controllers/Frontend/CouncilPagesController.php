<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\MediaRoomCategory;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Council;
use App\Models\CouncilMember;
use App\Models\MemberType;
use App\Models\President;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class CouncilPagesController extends Controller
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
        $totalVisitors = Visitor::count();
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
            'publicationOthers' => $publicationOthers,
            'menu_acts' => $menu_acts,
            'councils' => $councils,
            'totalVisitors' => $totalVisitors,
            'todayVisitors' => $todayVisitors,
        ]);
    }
    public function committee($slug): View
    {
        $s['committee'] = Committee::with(['committe_type','committe_members'])
                        ->where('slug',$slug)
                        ->where('status',1)
                        ->where('deleted_at',null)
                        ->first();
        $s['c_members'] = CommitteeMember::with(['committe','member','committe_member_type'])
                        ->where('committee_id',$s['committee']->id)
                        ->where('status',1)
                        ->where('deleted_at',null)
                        ->get();
        return view('frontend.council.committee',$s);
    }
    public function president(): View
    {
        $s['president'] = President::with(['durations','member'])
                        ->where('status',1)
                        ->where('deleted_at',null)
                        ->first();
        return view('frontend.council.president',$s);
    }
    public function presidentM(): View
    {
        $s['president'] = President::with(['durations','member'])
                        ->where('status',1)
                        ->where('deleted_at',null)
                        ->first();
        return view('frontend.council.president_message',$s);
    }
    public function pastPresidents(): View
    {
        $s['p_presidents'] = President::with(['durations','member'])
                        ->where('deleted_at',null)
                        ->orderBy('order_key','DESC')
                        ->get();
        return view('frontend.council.past_presidents',$s);
    }
    public function singlePP($slug): View
    {
        $s['president'] = President::with(['durations','member'])
                        ->where('slug',$slug)
                        ->where('deleted_at',null)
                        ->first();
        return view('frontend.council.president',$s);
    }
    public function council_m($slug): View
    {
        $s['council'] = Council::where('deleted_at', null)->where('status',1)->where('slug',$slug)->first();
        $s['c_members'] = CouncilMember::with('member','council_member_type')
                        ->where('council_id',$s['council']->id)
                        ->where('status',1)
                        ->where('deleted_at',null)
                        ->orderBy('order_key','ASC')
                        ->get();
        return view('frontend.council.council',$s);
    }

}
