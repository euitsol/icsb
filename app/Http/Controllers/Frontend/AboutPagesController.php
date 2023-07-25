<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Contact;
use Illuminate\View\View;

class AboutPagesController extends Controller
{
    public function __construct() {
        $this->contact = Contact::where('deleted_at', null)->first();
        view()->share('contact', $this->contact);
    }

    public function index(): View
    {
        $s['services'] = Service::where('deleted_at', null)->get();
        return view('frontend.about.about',$s);
    }
    public function council(): View
    {
        return view('frontend.about.council');
    }
    public function csrActivities(): View
    {
        return view('frontend.about.csr_activities');
    }
    public function faq(): View
    {
        $s['faqs']= Faq::where('deleted_at', null)->latest()->get();
        return view('frontend.about.faq',$s);
    }
    public function assignedOfficer(): View
    {
        return view('frontend.about.assigned_officer');
    }
}
