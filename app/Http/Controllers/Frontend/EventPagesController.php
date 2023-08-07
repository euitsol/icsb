<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\SecretarialStandard;

class EventPagesController extends Controller
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
