<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentsPagesController extends Controller
{
    public function wwcs(): View
    {
        return view('frontend.student.world_widechartered_secretaries');
    }
    public function studentsHandbook(): View
    {
        return view('frontend.student.students_handbook');
    }
    public function noticeBoard(): View
    {
        return view('frontend.student.notice_board');
    }
    public function eligibility(): View
    {
        return view('frontend.student.eligibility');
    }
    public function examSchedule(): View
    {
        return view('frontend.student.exam_schedule');
    }
    public function admissionRules(): View
    {
        return view('frontend.student.admission_rules');
    }
    public function admissionForm(): View
    {
        return view('frontend.student.admission_form');
    }
}
