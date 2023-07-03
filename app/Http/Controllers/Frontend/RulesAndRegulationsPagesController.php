<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RulesAndRegulationsPagesController extends Controller
{
    public function tcsa(){
        return view('frontend.rules_&_regulations.the_chartered_secretaries_act_2010');
    }
    public function tcsr(){
        return view('frontend.rules_&_regulations.the_chartered_secretaries_regulations_2011');
    }
}
