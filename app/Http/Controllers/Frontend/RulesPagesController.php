<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\MediaRoomCategory;
use App\Models\MemberType;
use App\Models\SecretarialStandard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class RulesPagesController extends Controller
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
    }
    public function bss_view($slug): View
    {
        $s['view_bss'] = SecretarialStandard::where('deleted_at', null)->where('status', 1)->where('slug', $slug)->first();
        return view('frontend.rules.bss_view',$s);
    }
}
