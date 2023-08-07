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
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->get();
        $bsss = SecretarialStandard::where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
            'bsss' => $bsss,
        ]);
        return $this->middleware('auth');
    }
    public function frontend($fs): View
    {

        $s['single_page'] = SinglePages::where('frontend_slug', $fs)->first();
        if($s['single_page']->frontend_slug == 'vision')
        {
            $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
            return view('frontend.about.vision',$s);
        }elseif($s['single_page']->frontend_slug == 'mission')
        {
            $s['national_awards'] = NationalAward::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
            return view('frontend.about.mission',$s);
        }elseif($s['single_page']->frontend_slug == 'objectives')
        {
            $s['media_rooms'] = MediaRoom::where('deleted_at', null)->where('permission','1')->where('is_featured','1')->latest()->get();
            $s['events'] = Event::where('deleted_at', null)->where('is_featured','1')->where('status',1)->latest()->get();
            return view('frontend.about.objectives',$s);
        }elseif($s['single_page']->frontend_slug == 'exam-schedule')
        {
            return view('frontend.examination.exam_schedule',$s);
        }elseif($s['single_page']->frontend_slug == 'job-placement')
        {
            return view('frontend.members.job_placement',$s);
        }elseif($s['single_page']->frontend_slug == 'icsb-profile')
        {
            $s['wwcss'] = WWCS::where('status',1)->where('deleted_at', null)->latest()->get();
            return view('frontend.about.icsb_profile',$s);
        }else{

            return view('frontend.global', $s);
        }
    }
}
