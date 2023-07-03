<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouncilPagesController extends Controller
{
    public function council(){
        return view('frontend.council.council');
    }
    public function committee(){
        return view('frontend.council.committee');
    }
    public function pastPresidents(){
        return view('frontend.council.past_presidents');
    }
    public function president(){
        return view('frontend.council.president');
    }
    public function previousCouncil(){
        return view('frontend.council.previous_council');
    }
}
