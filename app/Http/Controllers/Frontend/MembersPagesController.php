<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\View\View;

class MembersPagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = BlogCategory::with('blogs')->where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
        ]);
    }

    public function memberSearch($slug): View
    {
        $s['type'] = MemberType::with('members')->where('status', 1)->where('slug', $slug)->first();
        return view('frontend.members.member_view',$s);

    }
    // public function jobPlacement(): View
    // {
    //     return view('frontend.members.job_placement');

    // }
}
