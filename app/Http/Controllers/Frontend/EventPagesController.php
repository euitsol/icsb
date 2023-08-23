<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Models\Council;
use App\Models\MemberType;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;

class EventPagesController extends Controller
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
    public function events(): View
    {
        $s['events'] = Event::where('status',1)->where('deleted_at', null)->latest()->get();
        return view('frontend.event.events',$s);
    }
    public function view($slug): View
    {
        $s['event'] = Event::where('status',1)->where('deleted_at', null)->where('slug',$slug)->first();
        return view('frontend.event.view',$s);
    }

}
