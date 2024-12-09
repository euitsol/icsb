<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\MediaRoom;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Council;
use App\Models\Event;
use App\Models\MemberType;
use App\Models\NationalAward;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\WWCS;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FrontendSinglePagesController extends Controller
{
    public function __construct()
    {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->orderBy('order_key', 'ASC')->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->orderBy('order_key', 'ASC')->get();
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
        $menu_acts = Act::where('deleted_at', null)->where('status', 1)->orderBy('order_key', 'ASC')->get();
        $councils = Council::where('deleted_at', null)->where('status', 1)->orderBy('order_key', 'ASC')->get();
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
    public function frontend($fs): View
    {

        $s['single_page'] = SinglePages::where('frontend_slug', $fs)->firstOrFail();
        switch ($s['single_page']) {
            case ($s['single_page']->frontend_slug == 'icsb-profile'):
                // $s['wwcss'] = WWCS::where('status',1)->where('deleted_at', null)->latest()->get();
                // $s['home_bsss'] = SecretarialStandard::where('deleted_at', null)->where('is_featured','1')->where('status', 1)->get();
                return view('frontend.about.icsb_profile', $s);
                break;
            case ($s['single_page']->frontend_slug == 'vision'):
                return view('frontend.about.vision', $s);
                break;
            case ($s['single_page']->frontend_slug == 'mission'):
                return view('frontend.about.mission', $s);
                break;
            case ($s['single_page']->frontend_slug == 'objectives'):
                return view('frontend.about.objectives', $s);
                break;
            case ($s['single_page']->frontend_slug == 'values'):
                return view('frontend.about.values', $s);
                break;
            case ($s['single_page']->frontend_slug == 'cpd-program'):
                return view('frontend.members.cpd_program', $s);
                break;
            case ($s['single_page']->frontend_slug == 'training-program'):
                return view('frontend.members.training_program', $s);
                break;
            case ($s['single_page']->frontend_slug == 'help-desk'):
                return view('frontend.employee.help_desk', $s);
                break;
            case ($s['single_page']->frontend_slug == 'the-chartered-secretary'):
                return view('frontend.publication.the_cs', $s);
                break;
            case ($s['single_page']->frontend_slug == 'policy'):
                return view('frontend.student.admission.policy', $s);
                break;
            case ($s['single_page']->frontend_slug == 'admission-form'):
                return view('frontend.student.admission.admission_forms', $s);
                break;
            case ($s['single_page']->frontend_slug == 'entry-criteria'):
                return view('frontend.student.admission.entry_criteria', $s);
                break;
            case (
                $s['single_page']->frontend_slug == 'annual-report' ||
                $s['single_page']->frontend_slug == 'other-publications'
            ):
                return view('frontend.publication.annual_report', $s);
                break;
            case ($s['single_page']->frontend_slug == 'eligibility'):
                return view('frontend.examination.eligibility', $s);
                break;
            case ($s['single_page']->frontend_slug == 'exam-schedule'):
                return view('frontend.examination.exam_schedule', $s);
                break;
            case ($s['single_page']->frontend_slug == 'members-lounge'):
                return view('frontend.members.member_lounge', $s);
                break;
            case ($s['single_page']->frontend_slug == 'icsb-library'):
                return view('frontend.student.icsb_library', $s);
                break;
            case ($s['single_page']->frontend_slug == 'fees-&-costs'):
                return view('frontend.student.admission.fees', $s);
                break;
            case ($s['single_page']->frontend_slug == 'app-privacy-policy'):
                return view('frontend.contact.app_privacy_policy', $s);
                break;
            case (
                $s['single_page']->frontend_slug == 'foundation-complete' ||
                $s['single_page']->frontend_slug == 'subject-complete' ||
                $s['single_page']->frontend_slug == 'final-complete'
            ):
                return view('frontend.examination.result', $s);
                break;
            default:
                return view('frontend.global', $s);
        }
    }

    // public function policy($slug){
    //     $data['file'] = '';
    //     $data['single_page'] = SinglePages::where('frontend_slug', 'policy')->firstOrFail();
    //     $data['title'] = '';
    //     foreach(json_decode($data['single_page']->saved_data)->{'upload-files'} as $key => $up){
    //         if($slug == make_slug(file_title_from_url($up))){
    //             $data['file'] = $up;
    //             $data['title'] = file_title_from_url($up);
    //         }
    //     }
    //     if(!empty($data['file'])){
    //         return view('frontend.student.admission.policy', $data);
    //     }else{
    //         abort(404);
    //     }
    // }

    public function view_or_download($file_url)
    {
        $file_url = base64_decode($file_url);
        if (Storage::exists('public/' . $file_url)) {
            $fileExtension = pathinfo($file_url, PATHINFO_EXTENSION);

            if (strtolower($fileExtension) === 'pdf') {
                return response()->file(storage_path('app/public/' . $file_url), [
                    'Content-Disposition' => 'inline; filename="' . basename($file_url) . '"'
                ]);
            } else {
                return response()->download(storage_path('app/public/' . $file_url), basename($file_url));
            }
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
