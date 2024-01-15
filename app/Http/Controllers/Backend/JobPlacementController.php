<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\JobPlacement;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JobPlacementRequest;
use Carbon\Carbon;
use App\Http\Traits\SendMailTrait;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberMail;

class JobPlacementController extends Controller
{
    use SendMailTrait;
    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $disclosed = JobPlacement::where('deadline', '<', Carbon::now()->format('Y-m-d'))->get();
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


        $id = Crypt::encrypt($jp->id);
        $subject = "Job Post Status";
        $url = route('member_view.job_edit',$id);
        $mail =
        "
        <p>Dear Sir,</p> <br>

        <p> Thank you for choosing ICSB Job Portal to post your job opportunity. We appreciate your trust in our platform to connect you with potential candidates.</p><br>

        <p>We want to inform you that your job post is currently in the pending status. Our team is working diligently to review and approve your job listing. Once approved, it will be live on our platform for job seekers to view and apply.</p><br>

        <a href='".$url."' target='_blank'>Edit Job Post</a>
        ";

        $this->send_custom_email($mail,$subject, $jp->email);


        $salary = '';
            if (isset(json_decode($jp->salary)->from) & isset(json_decode($jp->salary)->to)){
                $salary ="<span>".json_decode($jp->salary)->from . ' - ' . json_decode($jp->salary)->to ."</span> TK./";
            }
        $salary .=  $jp->salary_type;
        $job_location = html_entity_decode_table($jp->job_location);
        $years = 'Years';

        $admin_subject = "New job posted on your job portal";
        $admin_mail =
        "
        <p>A new job posting has been added to our platform.</p><br>
        <p><strong>Job Title:</strong> $jp->title</p> 
        <p><strong>Company Name:</strong> $jp->company_name</p> 
        <p><strong>Location:</strong> $job_location</p> 
        <p><strong>Experience Requirements:</strong> $jp->experience_requirement $years</p> 
        <p><strong>Age Requirements:</strong> $jp->age_requirement $years</p> 
        <p><strong>Salary:</strong> $salary</p> 
        <p><strong>Appliation Deadline:</strong> $jp->deadline</p> 
        <p>You can view the full job posting and manage it by logging into the admin panel. If you have any questions related to this job posting, please contact to the given contact person.</p>
        ";
        $to = ['icsbsec@gmail.com','hr@icsb.edu.bd','itofficer@icsb.edu.bd'];
        $this->send_custom_email($admin_mail,$admin_subject, $to);

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

        $id = Crypt::encrypt($jp->id);
        $url = route('member_view.job_edit',$id);
        $subject = "Job Post Status";
        $mail =
        "
        <p>Dear Sir,</p><br>

        <p>Your job post has been editted successfully. We appreciate your trust in our platform to connect you with potential candidates.</p><br>

        <p>We want to inform you that your job post is currently in the pending status. Our team is working diligently to review and approve your job listing. Once approved, it will be live on our platform for job seekers to view and apply.</p><br>

        <a href='".$url."' target='_blank'>Edit Job Post</a>
        ";
        $this->send_custom_email($mail,$subject, $jp->email);
        $admin_subject = "A pending job was editted on your job portal";
        $admin_mail =
        "
        <p>Job Title: $jp->title</p> <br>
        <p>Email: $jp->email</p> <br>
        <p>Details: </p> $jp->job_responsibility <br>
        ";
        $to = ['icsbsec@gmail.com','hr@icsb.edu.bd','itofficer@icsb.edu.bd'];
        $this->send_custom_email($admin_mail,$admin_subject, $to);



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
            $salary = '';
            if (isset(json_decode($jp->salary)->from) & isset(json_decode($jp->salary)->to)){
                $salary ="<span>".json_decode($jp->salary)->from . ' - ' . json_decode($jp->salary)->to ."</span> TK./";
            }
            $salary .=  $jp->salary_type;
            $job_location = html_entity_decode_table($jp->job_location);
            $years = 'Years';


            $jid = Crypt::encrypt($id);
            $url = route('member_view.job_details',$jid);
            $jp->status = '1';
            $jp->email_subject = "New Job Opportunity Posted on ICSB Job Portal";
            $jp->email_body = "
                <p><strong>Job Title:</strong> $jp->title</p> 
                <p><strong>Company Name:</strong> $jp->company_name</p> 
                <p><strong>Location:</strong> $job_location</p> 
                <p><strong>Experience Requirements:</strong> $jp->experience_requirement $years</p> 
                <p><strong>Age Requirements:</strong> $jp->age_requirement $years</p> 
                <p><strong>Salary:</strong> $salary</p> 
                <p><strong>Appliation Deadline:</strong> $jp->deadline</p> 
                <p><span style='color:red;'>To learn more details about available jobs, please visit the-</span></p>
                <u><a href='".$url."' style='color:#102694;' target='_blank'><strong>ICSB Job Portal: CLICK HERE</strong></a></u>
            ";
            $jp->save();

            $subject = "Approval of Your Job Post";
            $mail =
            "
           <p>Dear Sir,</p><br>

           <p> We are pleased to inform you that your job post has been reviewed and approved by our team. Your job listing is now live on our platform and accessible to job seekers who are eager to explore opportunities.</p><br>

            <p>We appreciate your trust in our platform to connect you with potential candidates. Your job post will undoubtedly contribute to the success of your recruitment efforts.</p><br>

            <p>Thank you for using our platform, and we wish you the best in finding the perfect candidate for your job opening.</p><br>

            <p><span style='color:red;'>To learn more details about available jobs, please visit the-</span> </p>
            <u><a href='".$url."' style='color:#102694;' target='_blank'><strong>ICSB Job Portal: CLICK HERE</strong></a></u>
            ";
            $this->send_custom_email($mail,$subject, $jp->email);
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
        $this->send_custom_email($mail,$subject, $jp->email);
        }elseif($status == 'disclosed'){
            $jp->status = '2';
            $jp->save();
            $subject = "Disclosed of your Job Post";
            $mail =
            "
            <p>Dear Sir,</p> <br><br>

            <p>Your job post has been disclosed</p>
            ";
            $this->send_custom_email($mail,$subject, $jp->email);
        }
        return redirect()->route('job_placement.jp_list')->withStatus(__($jp->title.' status updated successfully.'));
    }
    public function testMail(Request $req, $id)
    {
        $validator = Validator::make($req->all(),[
            'email' => 'required|email',
        ]);
        if($validator->passes()) {
            $jp = JobPlacement::findOrFail($id);

            $salary = '';
            if (isset(json_decode($jp->salary)->from) & isset(json_decode($jp->salary)->to)){
                $salary ="<span>".json_decode($jp->salary)->from . ' - ' . json_decode($jp->salary)->to ."</span> TK./";
            }
            $salary .=  $jp->salary_type;
            $job_location = html_entity_decode_table($jp->job_location);
            $years = 'Years';


            $jid = Crypt::encrypt($id);
            $url = route('member_view.job_details',$jid);
            $jp->status = '1';
            $jp->email_subject = "New Job Opportunity Posted on ICSB Job Portal";
            $jp->email_body = "
                <p><strong>Job Title:</strong> $jp->title</p> 
                <p><strong>Company Name:</strong> $jp->company_name</p> 
                <p><strong>Location:</strong> $job_location</p> 
                <p><strong>Experience Requirements:</strong> $jp->experience_requirement $years</p> 
                <p><strong>Age Requirements:</strong> $jp->age_requirement $years</p> 
                <p><strong>Salary:</strong> $salary</p> 
                <p><strong>Appliation Deadline:</strong> $jp->deadline</p> 
                <p><span style='color:red;'>To learn more details about available jobs, please visit the-</span></p>
                <u><a href='".$url."' style='color:#102694;' target='_blank'><strong>ICSB Job Portal: CLICK HERE</strong></a></u>
            ";
            $jp->save();
            Mail::to($req->email)->send(new MemberMail($jp));

            return redirect()->route('job_placement.jp_list')->withStatus(__('Test mail send successful'));
        }else{
            return redirect()->route('job_placement.jp_list')->withStatus(__('Please enter your email.'));
        }
    

       
    }
}
