<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Models\JobPlacement;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JobPlacementRequest;

class JobPlacementController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['job_placements'] = JobPlacement::where('deleted_at', null)->latest()->get();
        return view('backend.member.job_placement.index',$s);
    }
    public function create(): View
    {
        return view('backend.member.job_placement.create');
    }
    public function store(JobPlacementRequest $request): RedirectResponse
    {
        $jp = new JobPlacement();
        $jp->title = $request->title;
        $jp->company_name = $request->company_name;
        $jp->company_url = $request->company_url;
        $jp->job_type = json_encode($request->job_type);
        $jp->salary = json_encode($request->salary);
        $jp->salary_type = $request->salary_type;
        $jp->deadline = $request->deadline;
        $jp->created_by = auth()->user()->id;
        $jp->save();
        return redirect()->route('job_placement.jp_list')->withStatus(__('Job '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['jp'] = JobPlacement::findOrFail($id);
        return view('backend.member.job_placement.edit',$s);
    }
    public function update(JobPlacementRequest $request, $id): RedirectResponse
    {
        $jp = JobPlacement::findOrFail($id);
        $jp->title = $request->title;
        $jp->company_name = $request->company_name;
        $jp->company_url = $request->company_url;
        $jp->job_type = json_encode($request->job_type);
        $jp->salary = json_encode($request->salary);
        $jp->salary_type = $request->salary_type;
        $jp->deadline = $request->deadline;
        $jp->updated_by = auth()->user()->id;
        $jp->save();
        return redirect()->route('job_placement.jp_list')->withStatus(__('Job '.$request->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $jp = JobPlacement::findOrFail($id);
        $jp->delete();

        return redirect()->route('job_placement.jp_list')->withStatus(__('Job '.$jp->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $jp = JobPlacement::findOrFail($id);
        $this->statusChange($jp);
        return redirect()->route('job_placement.jp_list')->withStatus(__($jp->title.' status updated successfully.'));
    }
}