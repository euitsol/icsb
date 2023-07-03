<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembersPagesController extends Controller
{
    public function council(){
        return view('frontend.member.council');
    }
    public function fees(){
        return view('frontend.member.fees');
    }
    public function codeOfConduct(){
        return view('frontend.member.code_of_conduct');
    }
    public function cpdProgram(){
        return view('frontend.member.cpd_program');
    }
}
