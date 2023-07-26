<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\View\View;

class ContactPagesController extends Controller
{
    public function __construct()
     {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = memberType::where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
        ]);
    }
    public function feedback(): View
    {
        $contact = Contact::where('deleted_at', null)->first();
        $s['contact_numbers'] = collect(json_decode($contact->phone ?? ''))->groupBy('type');
        return view('frontend.contact.feedback',$s);
    }
}
