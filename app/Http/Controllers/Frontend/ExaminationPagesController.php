<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Council;
use App\Models\ExamFaq;
use App\Models\MemberType;
use App\Models\SampleQuestionPaper;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ExaminationPagesController extends Controller
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
    // public function examSchedule(): View
    // {
    //     return view('frontend.examination.exam_schedule');
    // }
    public function exam_faq(): View
    {
        $s['faqs']= ExamFaq::where('deleted_at', null)->orderBy('order_key','ASC')->get();
        return view('frontend.examination.exam_faq',$s);
    }
    public function sampleQP(): View
    {
        $s['sqps'] = SampleQuestionPaper::where('deleted_at', null)->where('status',1)->orderBy('order_key','ASC')->get();
        return view('frontend.examination.sample_question_papers',$s);
    }
    public function sampleQPView($slug): View
    {
        $s['sqp'] = SampleQuestionPaper::where('deleted_at',null)->where('status',1)->where('slug',$slug)->first();
        return view('frontend.examination.sample_qp_view',$s);
    }
}
