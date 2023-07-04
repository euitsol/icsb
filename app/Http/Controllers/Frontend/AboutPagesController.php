<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AboutPagesController extends Controller
{
    public function index(){
        return view('frontend.about.about');
    }
    public function council(){
        return view('frontend.about.council');
    }
    public function csrActivities(){
        return view('frontend.about.csr_activities');
    }
    public function faq(){
        $n['faqs']= Faq::latest()->get();
        return view('frontend.about.faq',$n);
    }
    public function assignedOfficer(){
        return view('frontend.about.assigned_officer');
    }
}
