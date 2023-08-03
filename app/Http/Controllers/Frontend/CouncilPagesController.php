<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class CouncilPagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
        ]);

    }
    public function committee($slug): View
    {
        $s['committee'] = Committee::with(['committe_type','committe_members'])
                        ->where('slug',$slug)
                        ->where('status',1)
                        ->where('deleted_at',null)
                        ->first();
        $s['c_members'] = CommitteeMember::with(['committe','member','committe_member_type'])
                        ->where('committee_id',$s['committee']->id)
                        ->where('status',1)
                        ->where('deleted_at',null)
                        ->get();
        return view('frontend.council.committee',$s);
    }
}
