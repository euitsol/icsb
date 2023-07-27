<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\View\View;

class MembersPagesController extends Controller
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

    public function memberSearch($slug): View
    {
        $s['type'] = MemberType::with('members')->where('slug', $slug)->first();
        return view('frontend.members.member_view',$s);

    }
}
