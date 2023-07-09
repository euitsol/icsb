<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Faq;
use App\Http\Requests\FaqRequest;

class FaqController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(){
        $n['faqs'] = Faq::latest()->get();
        return view('backend.faq.index',$n);
    }
    public function create(){
        return view('backend.faq.create');
    }
    public function store(FaqRequest $request){
        $faq = new Faq;
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();
        return redirect()->route('faq.faq_list');
    }
}
