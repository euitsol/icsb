<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Council;
use App\Models\MediaRoomCategory;
use App\Models\MemberType;
use App\Models\Notice;
use App\Models\NoticeCategory;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class NoticeBoardPageController extends Controller
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

    // public function notice($slug = null): View
    // {

    //     $s=[];
    //     if($slug !== null){
    //         $s['notice_cat'] = NoticeCategory::where('slug',$slug)->where('deleted_at',null)->first();
    //         if(!empty($s['notice_cat'])){
    //             $s['notices'] = Notice::where('cat_id',$s['notice_cat']->id)->where('deleted_at',null)->where('status',1)->latest()->paginate(10);
    //         }else{
    //             $s['notices'] = Notice::where('slug',$slug)->where('deleted_at',null)->where('status',1)->latest()->paginate(10);
    //         }
    //     }else{
    //         $s['notices'] = Notice::where('deleted_at',null)->where('status',1)->latest()->paginate(10);
    //     }
    //     return view('frontend.notice_board.notice',$s);

    // }
    public function notice($slug = null): View
    {

        $s=[];
        $s['slug'] = $slug;
        if($slug !== null){
            $s['notice_cat'] = NoticeCategory::where('slug',$slug)->where('deleted_at',null)->first();
            if(!empty($s['notice_cat'])){
                $s['notices'] = Notice::where('cat_id',$s['notice_cat']->id)->where('deleted_at',null)->where('status',1)->orderBy('release_date', 'DESC')->limit(12)->get();
            }else{
                $s['notices'] = Notice::where('slug',$slug)->where('deleted_at',null)->where('status',1)->orderBy('release_date', 'DESC')->limit(12)->get();
                
            }
        }else{
            $s['notices'] = Notice::where('deleted_at',null)->where('status',1)->orderBy('release_date', 'DESC')->limit(12)->get();
        }
        $s['count'] = Notice::where('deleted_at', null)->where('status',1)->orderBy('release_date', 'DESC')->get();
        return view('frontend.notice_board.notice',$s);

    }
}
