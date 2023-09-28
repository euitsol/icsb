<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Council;
use App\Models\CsFirms;
use App\Models\JobPlacement;
use App\Models\MemberType;
use App\Models\Member;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class MembersPagesController extends Controller
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
    public function memberSearch($slug): View
    {
        switch ($slug) {
            case 'honorary':
                $s['title'] = 'Honorary Members';
                $s['slug'] = 'honorary';
                $s['members'] = Member::where('mem_current_status', 1)->where('honorary', 1)->orderBy('membership_id', 'ASC')->get();
                break;

            case 'fellow':
                $s['title'] = 'Fellow Members';
                $s['slug'] = 'fellow';
                $s['members'] = Member::where('mem_current_status', 1)->where('type', 1)->latest()->get();
                break;

            case 'associate':
                $s['title'] = 'Associate Members';
                $s['slug'] = 'associate';
                $s['members'] = Member::where('mem_current_status', 1)->where('type', 0)->latest()->get();
                break;

            case 'deceased':
                $s['title'] = 'Deceased Members';
                $s['slug'] = 'deceased';
                $s['members'] = Member::where('mem_current_status', 3)->orderBy('membership_id', 'ASC')->get();
                break;

            default:
                $s['title'] = '';
                $s['slug'] = '';
                $s['members'] = [];
                break;
        }
        return view('frontend.members.member_view',$s);

    }
    public function job_placement(): View
    {
        $s['today'] = Carbon::now();
        $s['job_placements'] = JobPlacement::where('status',1)->where('deleted_at',null)->latest()->get();
        return view('frontend.members.job_placement',$s);

    }
    public function cs_firm(): View
    {
        // $s['csf_members'] = CsFirms::where('status',1)->where('deleted_at',null)->orderBy('private_practice_certificate_no','ASC')->get();
        return view('frontend.members.cs_firms');

    }
    public function members_lounge(): View
    {
        return view('frontend.members.member_lounge');

    }
    public function corporate_leader(): View
    {
        return view('frontend.members.find_leader');

    }
}
