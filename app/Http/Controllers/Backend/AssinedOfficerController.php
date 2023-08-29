<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssinedOfficerRequest;
use App\Models\AssinedOfficer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AssinedOfficerController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $n['assined_officers']= AssinedOfficer::where('deleted_at', null)->orderBy('order_key','ASC')->get();
        return view('backend.employee_pages.assined_officers.index',$n);
    }
    public function create(): View
    {
        return view('backend.employee_pages.assined_officers.create');
    }
    public function store(AssinedOfficerRequest $request): RedirectResponse
    {
        $assined_officer = new AssinedOfficer();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('assined_officers', 'public');
            $assined_officer->image = $path;
        }

        $assined_officer->order_key = $request->order_key;
        $assined_officer->name = $request->name;
        $assined_officer->designation = $request->designation;
        $assined_officer->phone = $request->phone;
        $assined_officer->email = $request->email;
        $assined_officer->created_by = auth()->user()->id;
        $assined_officer->save();
        return redirect()->route('assined_officer.assined_officer_list')->withStatus(__('Assined Officer '.$request->name.' created successfully.'));
    }
    public function edit($id): View
    {
        $n['asf'] = AssinedOfficer::findOrFail($id);
        return view('backend.employee_pages.assined_officers.edit', $n);
    }
    public function update(AssinedOfficerRequest $request, $id): RedirectResponse
    {
        $assined_officer = AssinedOfficer::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('assined_officerss', 'public');
            $this->fileDelete($assined_officer->image);
            $assined_officer->image = $path;
        }

        $assined_officer->order_key = $request->order_key;
        $assined_officer->name = $request->name;
        $assined_officer->designation = $request->designation;
        $assined_officer->phone = $request->phone;
        $assined_officer->email = $request->email;
        $assined_officer->updated_by = auth()->user()->id;
        $assined_officer->save();

        return redirect()->route('assined_officer.assined_officer_list')->withStatus(__('Assined Officer '.$assined_officer->name.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $assined_officer = AssinedOfficer::findOrFail($id);
        $this->fileDelete($assined_officer->image);
        $assined_officer->delete();

        return redirect()->route('assined_officer.assined_officer_list')->withStatus(__('Assined Officer '.$assined_officer->name.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $assined_officer = AssinedOfficer::findOrFail($id);
        $this->statusChange($assined_officer);
        return redirect()->route('assined_officer.assined_officer_list')->withStatus(__($assined_officer->name.' status updated successfully.'));
    }
}
