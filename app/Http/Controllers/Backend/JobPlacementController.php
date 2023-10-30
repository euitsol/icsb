<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\JobPlacement;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JobPlacementRequest;
use Carbon\Carbon;
use App\Http\Traits\SendMailTrait;

class JobPlacementController extends Controller
{
    use SendMailTrait;
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
        dd($request->salary);
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
        return redirect()->route('job_placement.jp_list')->withStatus(__('Job '.$jp->title.' created successfully.'));
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
        return redirect()->route('job_placement.jp_list')->withStatus(__('Job '.$jp->title.' updated successfully.'));
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
            $url = route('member_view.jps');
            $jp->status = '1';
            $jp->notify = 1;
            $jp->email_subject = "New job opportunitie $jp->title";
            $jp->email_body = "$jp->job_responsibility <br> <a href='".$url."' target='_blank'>Live Job Posts</a>";
            $jp->save();
            $url = route('member_view.jps');
            $subject = "Approval of Your Job Post";
            $mail =
            "
           <p>Dear Sir,</p><br>

           <p> We are pleased to inform you that your job post has been reviewed and approved by our team. Your job listing is now live on our platform and accessible to job seekers who are eager to explore opportunities.</p><br>

            <p>We appreciate your trust in our platform to connect you with potential candidates. Your job post will undoubtedly contribute to the success of your recruitment efforts.</p><br>

            <p>Thank you for using our platform, and we wish you the best in finding the perfect candidate for your job opening.</p><br>

            <a href='".$url."' target='_blank'>Live Job Posts</a>
            ";
            $this->send_feedback_email($mail,$subject, $jp->email);
            $this->send_member_email($jp);

        }elseif($status == 'declined'){
            $jp->status = '-1';
            $jp->save();
            $subject = "Declined of your Job Post";
            $mail =
            "
           <p>Dear Sir,</p><br>

            <p>Your job post has been declined</p>
            ";
        $this->send_feedback_email($mail,$subject, $jp->email);
        }elseif($status == 'disclosed'){
            $jp->status = '2';
            $jp->save();
            $subject = "Disclosed of your Job Post";
            $mail =
            "
            <p>Dear Sir,</p> <br><br>

            <p>Your job post has been disclosed</p>
            ";
            $this->send_feedback_email($mail,$subject, $jp->email);
        }
        return redirect()->route('job_placement.jp_list')->withStatus(__($jp->title.' status updated successfully.'));
    }
}
