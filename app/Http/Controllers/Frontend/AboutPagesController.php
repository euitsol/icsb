<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Contact;
use Illuminate\View\View;
use App\Models\MemberType;

class AboutPagesController extends Controller
{
    public function __construct() {
        // $this->contact = Contact::where('deleted_at', null)->first();
        // view()->share('contact', $this->contact);
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

}
