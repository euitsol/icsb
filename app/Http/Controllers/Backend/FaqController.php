<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Faq;
use App\Http\Requests\FaqRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FaqController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['faqs'] = Faq::where('deleted_at', null)->orderBy('order_key','ASC')->get();
        return view('backend.about_pages.faq.index',$s);
    }
    public function create(): View
    {
        return view('backend.about_pages.faq.create');
    }
    public function store(FaqRequest $request): RedirectResponse
    {
        $faq = new Faq();
        $faq->title = $request->title;
        $faq->order_key = $request->order_key;
        $faq->description = $request->description;
        $faq->created_by = auth()->user()->id;
        $faq->save();
        return redirect()->route('about.faq.faq_list')->withStatus(__('Faq '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['faq'] = Faq::findOrFail($id);
        return view('backend.about_pages.faq.edit', $s);
    }
    public function update(FaqRequest $request, $id): RedirectResponse
    {
        $faq = Faq::findOrFail($id);
        $faq->title = $request->title;
        $faq->order_key = $request->order_key;
        $faq->description = $request->description;
        $faq->updated_by = auth()->user()->id;
        $faq->save();

        return redirect()->route('about.faq.faq_list')->withStatus(__('Faq '.$faq->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $faq = Faq::findOrFail($id);
        // $faq->delete();
        $this->soft_delete($faq);

        return redirect()->route('about.faq.faq_list')->withStatus(__('Faq '.$faq->title.' deleted successfully.'));
    }
}
