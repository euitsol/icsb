<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Contact;
use Illuminate\View\View;
use App\Models\MemberType;
use App\Models\WWCS;

class AboutPagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = memberType::where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
        ]);
    }
    public function faq(): View
    {
        $s['faqs']= Faq::where('deleted_at', null)->latest()->get();
        return view('frontend.about.faq',$s);
    }
    public function wwcs(): View
    {
        $s['wwcss'] = WWCS::where('status',1)->where('deleted_at', null)->latest()->get();
        return view('frontend.about.wwcs',$s);
    }

}
