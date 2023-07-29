<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\View\View;
use App\Models\Event;

class EventPagesController extends Controller
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
