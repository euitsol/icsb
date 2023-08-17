<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MediaRoom;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Event;
use App\Models\MemberType;
use App\Models\NationalAward;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\WWCS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class FrontendSinglePagesController extends Controller
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
    public function frontend($fs): View
    {

        $s['single_page'] = SinglePages::where('frontend_slug', $fs)->firstOrFail();
        switch($s['single_page']){
            case($s['single_page']->frontend_slug == 'icsb-profile'):
                // $s['wwcss'] = WWCS::where('status',1)->where('deleted_at', null)->latest()->get();
                // $s['home_bsss'] = SecretarialStandard::where('deleted_at', null)->where('is_featured','1')->where('status', 1)->get();
                return view('frontend.about.icsb_profile',$s);
                break;
            case($s['single_page']->frontend_slug == 'vision'):
                return view('frontend.about.vision',$s);
                break;
            case($s['single_page']->frontend_slug == 'mission'):
                return view('frontend.about.mission',$s);
                break;
            case($s['single_page']->frontend_slug == 'objectives'):
                return view('frontend.about.objectives',$s);
                break;
            case($s['single_page']->frontend_slug == 'values'):
                return view('frontend.about.values',$s);
                break;
            case($s['single_page']->frontend_slug == 'cpd-program'):
                return view('frontend.members.cpd_program',$s);
                break;
            case($s['single_page']->frontend_slug == 'training-program'):
                return view('frontend.members.training_program',$s);
                break;
            case($s['single_page']->frontend_slug == 'help-desk'):
                return view('frontend.employee.help_desk',$s);
                break;
            default:
                return view('frontend.global', $s);
        }
    }
}
