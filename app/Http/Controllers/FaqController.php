<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Http\Requests\FaqRequest;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $n['faqs'] = Faq::latest()->get();
        return view('admin.faq.index',$n);
    }
    public function create(){
        return view('admin.faq.create');
    }
    public function store(FaqRequest $request){
        $faq = new Faq;
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();
        return redirect()->route('faq.faq_list');
    }
}
