<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ExaminationPagesController extends Controller
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
    // public function examSchedule(): View
    // {
    //     return view('frontend.examination.exam_schedule');
    // }
}
