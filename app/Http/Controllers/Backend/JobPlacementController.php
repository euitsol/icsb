<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        $jp->application_url = $request->application_url;
        $jp->job_type = $request->job_type;
        $jp->salary = json_encode($request->salary);
        $jp->salary_type = $request->salary_type;
        $jp->deadline = $request->deadline;
        $jp->age_requirement = $request->age_requirement;
        $jp->experience_requirement = $request->experience_requirement;
        $jp->professional_requirement = $request->professional_requirement;
        $jp->educational_requirement = $request->educational_requirement;
        $jp->additional_requirement = $request->additional_requirement;
        $jp->company_addess = $request->company_addess;
        $jp->job_responsibility = $request->job_responsibility;
        $jp->other_benefits = $request->other_benefits;
        $jp->job_location = $request->job_location;
        $jp->special_instructions = $request->special_instructions;
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
        $jp->application_url = $request->application_url;
        $jp->job_type = $request->job_type;
        $jp->salary = json_encode($request->salary);
        $jp->salary_type = $request->salary_type;
        $jp->deadline = $request->deadline;
        $jp->age_requirement = $request->age_requirement;
        $jp->experience_requirement = $request->experience_requirement;
        $jp->professional_requirement = $request->professional_requirement;
        $jp->educational_requirement = $request->educational_requirement;
        $jp->additional_requirement = $request->additional_requirement;
        $jp->company_addess = $request->company_addess;
        $jp->job_responsibility = $request->job_responsibility;
        $jp->other_benefits = $request->other_benefits;
        $jp->job_location = $request->job_location;
        $jp->special_instructions = $request->special_instructions;
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
