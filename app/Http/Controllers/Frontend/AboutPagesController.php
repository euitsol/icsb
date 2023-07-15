<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\View\View;

class AboutPagesController extends Controller
{
    public function index(): View
    {
        $n['services'] = Service::where('deleted_at', null)->get();
        return view('frontend.about.about',$n);
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
        $n['faqs']= Faq::where('deleted_at', null)->latest()->get();
        return view('frontend.about.faq',$n);
    }
    public function assignedOfficer(): View
    {
        return view('frontend.about.assigned_officer');
    }
}
