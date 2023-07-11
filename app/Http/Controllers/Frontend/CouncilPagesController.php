<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CouncilPagesController extends Controller
{
    public function council(): View
    {
        return view('frontend.council.council');
    }
    public function committee(): View
    {
        return view('frontend.council.committee');
    }
    public function pastPresidents(): View
    {
        return view('frontend.council.past_presidents');
    }
    public function president(): View
    {
        return view('frontend.council.president');
    }
    public function previousCouncil(): View
    {
        return view('frontend.council.previous_council');
    }
}
