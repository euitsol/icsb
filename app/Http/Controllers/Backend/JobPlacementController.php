<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\JobPlacement;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JobPlacementRequest;
use Carbon\Carbon;

class JobPlacementController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $disclosed = JobPlacement::where('deadline','<',Carbon::now())->get();
        foreach($disclosed as $d){
            $d->status = '2';
            $d->save();
        }
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
        $jp->email = $request->email;
        $jp->salary = json_encode($request->salary);
        $jp->salary_type = $request->salary_type;
        $jp->deadline = $request->deadline;
        $jp->vacancy = $request->vacancy;
        $jp->age_requirement = $request->age_requirement;
        $jp->experience_requirement = $request->experience_requirement;
        $jp->professional_requirement = $request->professional_requirement;
        $jp->educational_requirement = $request->educational_requirement;
        $jp->additional_requirement = $request->additional_requirement;
        $jp->company_address = $request->company_address;
        $jp->job_responsibility = $request->job_responsibility;
        $jp->other_benefits = $request->other_benefits;
        $jp->job_location = $request->job_location;
        $jp->special_instractions = $request->special_instractions;
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
        $jp->email = $request->email;
        $jp->salary = json_encode($request->salary);
        $jp->salary_type = $request->salary_type;
        $jp->deadline = $request->deadline;
        $jp->vacancy = $request->vacancy;
        $jp->age_requirement = $request->age_requirement;
        $jp->experience_requirement = $request->experience_requirement;
        $jp->professional_requirement = $request->professional_requirement;
        $jp->educational_requirement = $request->educational_requirement;
        $jp->additional_requirement = $request->additional_requirement;
        $jp->company_address = $request->company_address;
        $jp->job_responsibility = $request->job_responsibility;
        $jp->other_benefits = $request->other_benefits;
        $jp->job_location = $request->job_location;
        $jp->special_instractions = $request->special_instractions;
        $jp->updated_by = auth()->user()->id;
        $jp->save();
        return redirect()->route('job_placement.jp_list')->withStatus(__('Job '.$request->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $jp = JobPlacement::findOrFail($id);
        // $jp->delete();
        $this->soft_delete($jp);

        return redirect()->route('job_placement.jp_list')->withStatus(__('Job '.$jp->title.' deleted successfully.'));
    }
    public function status($id, $status): RedirectResponse
    {
        $jp = JobPlacement::findOrFail($id);
        if($status == 'accept'){
            $jp->status = '1';
            $jp->save();
            // $id = base64_encode($jp->id);
            // $status = base64_encode($jp->status);
            $id = $jp->id;
            $status = $jp->status;
            $url = route('member_view.jps');
            $subject = "Approval of Your Job Post";
            $mail =
            "
            Dear Sir,<br><br>

            I am pleased to inform you that your job post has been reviewed and approved by our team. Your job listing is now live on our platform and accessible to job seekers who are eager to explore opportunities.<br><br>

            We appreciate your trust in our platform to connect you with potential candidates. Your job post will undoubtedly contribute to the success of your recruitment efforts.<br><br>

            Thank you for using our platform, and we wish you the best in finding the perfect candidate for your job opening.<br><br>

            Live URL: $url
            ";
            $this->send_feedback_email($mail,$subject, $jp->email);
        }elseif($status == 'declined'){
            $jp->status = '-1';
            $jp->save();
            // $id = base64_encode($jp->id);
            // $status = base64_encode($jp->status);
            $id = $jp->id;
            $status = $jp->status;
            $url = route('member_view.job_edit',[$id,$status]);
            $subject = "Declined of your Job Post";
            $mail =
            "
            Dear Sir, <br><br>

            Your Job post was declined from ICSB Job Portal

            Edit URL:$url
            ";
        $this->send_feedback_email($mail,$subject, $jp->email);
        }elseif($status == 'disclosed'){
            $jp->status = '2';
            $jp->save();
            // $id = base64_encode($jp->id);
            // $status = base64_encode($jp->status);
            $id = $jp->id;
            $status = $jp->status;
            $url = route('member_view.job_edit',[$id,$status]);
            $subject = "Disclosed of your Job Post";
            $mail =
            "
            Dear Sir, <br><br>

            Your Job post was declined from ICSB Job Portal

            Edit URL: $url
            ";
            $this->send_feedback_email($mail,$subject, $jp->email);
        }elseif($status == 'restore'){
            if($jp->deadline < Carbon::now()){
                return redirect()->route('job_placement.jp_list')->withStatus(__('This post deadline expired please update the deadline before.'));
            }else{
                $jp->status = '0';
                $jp->save();
                // $id = base64_encode($jp->id);
                // $status = base64_encode($jp->status);
                $id = $jp->id;
                $status = $jp->status;
                $url = route('member_view.job_edit',[$id,$status]);
                $subject = "Re-post of your Job Post";
                $mail =
                "
                Dear Sir, <br><br>

                Re-post of your Job Post. We appreciate your trust in our platform to connect you with potential candidates.<br><br>

                We want to inform you that your job post is currently in the pending status. Our team is working diligently to review and approve your job listing. Once approved, it will be live on our platform for job seekers to view and apply. <br><br>

                Edit URL: $url
                ";
                $this->send_feedback_email($mail,$subject, $jp->email);
            }

        }
        return redirect()->route('job_placement.jp_list')->withStatus(__($jp->title.' status updated successfully.'));
    }
}
