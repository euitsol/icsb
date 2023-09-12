<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Convocation;
use App\Models\Council;
use App\Models\MediaRoomCategory;
use App\Models\MemberType;
use App\Models\NationalAward;
use App\Models\Notice;
use App\Models\NoticeCategory;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AjaxController extends Controller
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
    public function noticeHome($id): JsonResponse
    {
        $notice_cat = '';
        if($id != 0){
            $notice_cat=  NoticeCategory::findOrFail($id);
            $notices = Notice::with('category')->where('cat_id',$notice_cat->id)->where('deleted_at',null)->where('status',1)->latest()->limit(4)->get()
            ->map(function ($notice) {
                $notice->date = date('M d, Y', strtotime($notice->created_at));
                $notice->time = date('H:i A', strtotime($notice->created_at));
                return $notice;
            });
        }else{
            $notices = Notice::with('category')->where('deleted_at',null)->where('status',1)->latest()->limit(4)->get()
            ->map(function ($notice) {
                $notice->date = date('M d, Y', strtotime($notice->created_at));
                $notice->time = date('H:i A', strtotime($notice->created_at));
                return $notice;
            });
        }

        return response()->json(['notices'=>$notices, 'notice_cat'=>$notice_cat]);
    }
    public function awards(): JsonResponse
    {
            $awards = NationalAward::where('deleted_at',null)->where('status',1)->get();
            return response()->json(['awards'=>$awards]);
    }
    public function convocation(): JsonResponse
    {
            $convocations = Convocation::where('deleted_at',null)->where('status',1)->get();
            return response()->json(['convocations'=>$convocations]);
    }
}
