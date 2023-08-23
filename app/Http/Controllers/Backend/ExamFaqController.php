<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamFaqRequest;
use App\Models\ExamFaq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ExamFaqController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['faqs'] = ExamFaq::where('deleted_at', null)->orderBy('order_key','ASC')->get();
        return view('backend.examination.exam_faq.index',$s);
    }
    public function create(): View
    {
        return view('backend.examination.exam_faq.create');
    }
    public function store(ExamFaqRequest $request): RedirectResponse
    {
        $faq = new ExamFaq();
        $faq->title = $request->title;
        $faq->order_key = $request->order_key;
        $faq->description = $request->description;
        $faq->created_by = auth()->user()->id;
        $faq->save();
        return redirect()->route('exam_faq.exam_faq_list')->withStatus(__('Faq '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['faq'] = ExamFaq::findOrFail($id);
        return view('backend.examination.exam_faq.edit', $s);
    }
    public function update(ExamFaqRequest $request, $id): RedirectResponse
    {
        $faq = ExamFaq::findOrFail($id);
        $faq->title = $request->title;
        $faq->order_key = $request->order_key;
        $faq->description = $request->description;
        $faq->updated_by = auth()->user()->id;
        $faq->save();

        return redirect()->route('exam_faq.exam_faq_list')->withStatus(__('Faq '.$faq->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $faq = ExamFaq::findOrFail($id);
        $faq->delete();

        return redirect()->route('exam_faq.exam_faq_list')->withStatus(__('Faq '.$faq->title.' deleted successfully.'));
    }
}
