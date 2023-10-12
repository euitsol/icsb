<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['testimonials']= Testimonial::where('deleted_at', null)->orderBy('order_key','ASC')->get();
        return view('backend.testimonial.index',$s);
    }
    public function create(): View
    {
        return view('backend.testimonial.create');
    }
    public function store(TestimonialRequest $request): RedirectResponse
    {
        $testimonial = new Testimonial();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('testimonial', 'public');
            $testimonial->image = $path;
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->responsibility = $request->responsibility;
        $testimonial->order_key = $request->order_key;
        $testimonial->description = $request->description;
        $testimonial->created_by = auth()->user()->id;
        $testimonial->save();
        return redirect()->route('testimonial.testimonial_list')->withStatus(__($testimonial->name.' testimonial added successfully.'));
    }
    public function edit($id): View
    {
        $n['testimonial'] = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit', $n);
    }
    public function update(TestimonialRequest $request, $id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('testimonial', 'public');
            $this->fileDelete($testimonial->image);
            $testimonial->image = $path;
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->responsibility = $request->responsibility;
        $testimonial->order_key = $request->order_key;
        $testimonial->description = $request->description;
        $testimonial->updated_by = auth()->user()->id;
        $testimonial->save();

        return redirect()->route('testimonial.testimonial_list')->withStatus(__($testimonial->name.' testimonial updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        // $this->fileDelete($testimonial->image);
        // $testimonial->delete();
        $this->soft_delete($testimonial);

        return redirect()->route('testimonial.testimonial_list')->withStatus(__($testimonial->name.' testimonial deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->statusChange($testimonial);
        return redirect()->route('testimonial.testimonial_list')->withStatus(__($testimonial->name.' testimonial status updated successfully.'));
    }
}
