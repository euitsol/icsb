<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsPagesController extends Controller
{
    public function wwcs(){
        return view('frontend.student.world_widechartered_secretaries');
    }
    public function studentsHandbook(){
        return view('frontend.student.students_handbook');
    }
    public function noticeBoard(){
        return view('frontend.student.notice_board');
    }
    public function eligibility(){
        return view('frontend.student.eligibility');
    }
    public function examSchedule(){
        return view('frontend.student.exam_schedule');
    }
    public function admissionRules(){
        return view('frontend.student.admission_rules');
    }
    public function admissionForm(){
        return view('frontend.student.admission_form');
    }
}
