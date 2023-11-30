<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\AdmissionCorner;
use App\Models\AdmissionCornerImage;
use App\Http\Requests\AdmissionCornerRequiest;
use App\Http\Requests\AdmissionCornerImageRequest;

class AdmissionCornerController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $s['admission_corners'] = AdmissionCorner::where('deleted_at',null)->orderBy('order_key','ASC')->get();
        $s['admission_corner_image'] = AdmissionCornerImage::where('deleted_at',null)->first();
        return view('backend.admission_corner.index',$s);
    }
    public function create(): View
    {
        return view('backend.admission_corner.create');
    }
    public function store(AdmissionCornerRequiest $request): RedirectResponse
    {
        $admission_corner = new AdmissionCorner();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('admission_corners', 'public');
            $admission_corner->image = $path;
        }
        $admission_corner->order_key = $request->order_key;
        $admission_corner->name = $request->name;
        $admission_corner->designation = $request->designation;
        $admission_corner->phone = $request->phone;
        $admission_corner->telephone = json_encode($request->telephone);
        $admission_corner->email = $request->email;
        $admission_corner->pabx = $request->pabx;
        $admission_corner->created_by = auth()->user()->id;
        $admission_corner->save();
        return redirect()->route('admission_corner.admission_corner_list')->withStatus(__($request->name.' information created successfully.'));
    }
    public function edit($id): View
    {
        $s['admission_corner'] = AdmissionCorner::findOrFail($id);
        return view('backend.admission_corner.edit', $s);
    }
    public function update(AdmissionCornerRequiest $request, $id): RedirectResponse
    {
        $admission_corner = AdmissionCorner::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('admission_corners', 'public');
            $this->fileDelete($admission_corner->image);
            $admission_corner->image = $path;
        }

        $admission_corner->order_key = $request->order_key;
        $admission_corner->name = $request->name;
        $admission_corner->designation = $request->designation;
        $admission_corner->phone = $request->phone;
        $admission_corner->telephone = json_encode($request->telephone);
        $admission_corner->email = $request->email;
        $admission_corner->pabx = $request->pabx;
        $admission_corner->updated_by = auth()->user()->id;
        $admission_corner->save();

        return redirect()->route('admission_corner.admission_corner_list')->withStatus(__($admission_corner->name.' information updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $admission_corner = AdmissionCorner::findOrFail($id);
        $this->soft_delete($admission_corner);

        return redirect()->route('admission_corner.admission_corner_list')->withStatus(__($admission_corner->name.' information deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $admission_corner = AdmissionCorner::findOrFail($id);
        $this->statusChange($admission_corner);
        return redirect()->route('admission_corner.admission_corner_list')->withStatus(__($admission_corner->name.' status updated successfully.'));
    }

    public function page_image_store(AdmissionCornerImageRequest $request){
        $admission_image = AdmissionCornerImage::where('deleted_at', null)->first();
        if ($admission_image === null) {
            $admission_image = new AdmissionCornerImage();
            if ($request->hasFile('page_image')) {
                $page_image = $request->file('page_image');
                $path = $page_image->store('admission_corners/page_image', 'public');
                $admission_image->page_image = $path;
            }
            $admission_image->created_by = auth()->user()->id;
            $admission_image->save();
        }
        if ($request->hasFile('page_image')) {
            $page_image = $request->file('page_image');
            $path = $page_image->store('contact/address', 'public');
            $this->fileDelete($admission_image->page_image);
            $admission_image->page_image = $path;
        }
        $admission_image->updated_by = auth()->user()->id;
        $admission_image->update();
        return redirect()->route('admission_corner.admission_corner_list')->withStatus(__('Admission corner page image updated successfully.'));
    }
}