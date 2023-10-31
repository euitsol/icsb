<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobPlacementRequest;
use App\Models\Act;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Council;
use App\Models\CsFirms;
use App\Models\JobPlacement;
use App\Models\MemberType;
use App\Models\Member;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Visitor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use App\Http\Traits\SendMailTrait;
use Illuminate\Support\Facades\Crypt;

class MembersPagesController extends Controller
{
    use SendMailTrait;
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $bsss = SecretarialStandard::where('deleted_at', null)->where('status', 1)->get();
        $memberPortal = SinglePages::where('frontend_slug', 'member-portal')->first();
        $studentPortal = SinglePages::where('frontend_slug', 'student-portal')->first();
        $studentLogin = SinglePages::where('frontend_slug', 'student-login')->first();
        $memberLogin  = SinglePages::where('frontend_slug', 'member-login')->first();
        $examRegistration  = SinglePages::where('frontend_slug', 'exam-registration')->first();
        $onlineAdmission  = SinglePages::where('frontend_slug', 'online-admission')->first();
        $facultyEvaluationSystem = SinglePages::where('frontend_slug', 'faculty-evaluation-system')->first();
        $publicationOthers = SinglePages::where('frontend_slug', 'others')->first();
        $policies = SinglePages::where('frontend_slug', 'policy')->first();
        $menu_acts = Act::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $councils = Council::where('deleted_at', null)->where('status', 1)->orderBy('order_key','ASC')->get();
        $totalVisitors = 50000 + Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', Carbon::today())->count();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
            'bsss' => $bsss,
            'memberPortal' => $memberPortal,
            'studentPortal' => $studentPortal,
            'studentLogin' => $studentLogin,
            'memberLogin' => $memberLogin,
            'examRegistration' => $examRegistration,
            'onlineAdmission' => $onlineAdmission,
            'facultyEvaluationSystem' => $facultyEvaluationSystem,
            'policies' => $policies,
            'publicationOthers' => $publicationOthers,
            'menu_acts' => $menu_acts,
            'councils' => $councils,
            'totalVisitors' => $totalVisitors,
            'todayVisitors' => $todayVisitors,
        ]);
    }
    public function memberSearch($slug): View
    {
        switch ($slug) {
            case 'honorary':
                $s['title'] = 'Honorary Members';
                $s['slug'] = 'honorary';
                $s['members'] = Member::where('mem_current_status', 1)->where('honorary', 1)->orderBy('membership_id', 'ASC')->get();
                break;

            case 'fellow':
                $s['title'] = 'Fellow Members';
                $s['slug'] = 'fellow';
                $s['members'] = Member::where('mem_current_status', 1)->where('type', 1)->latest()->get();
                break;

            case 'associate':
                $s['title'] = 'Associate Members';
                $s['slug'] = 'associate';
                $s['members'] = Member::where('mem_current_status', 1)->where('type', 0)->latest()->get();
                break;

            case 'deceased':
                $s['title'] = 'Deceased Members';
                $s['slug'] = 'deceased';
                $s['members'] = Member::where('mem_current_status', 3)
                ->orderByRaw("SUBSTRING_INDEX(membership_id, '-', 1) DESC")
                ->orderByRaw("CAST(SUBSTRING_INDEX(membership_id, '-', -1) AS UNSIGNED) ASC")
                ->get();
                break;

            default:
                $s['title'] = '';
                $s['slug'] = '';
                $s['members'] = [];
                break;
        }
        return view('frontend.members.member_view',$s);

    }
    public function job_placement(): View
    {
        $s['today'] = Carbon::now();
        $s['job_placements'] = JobPlacement::where('status','1')->where('deadline','>=',$s['today'])
        ->where('deleted_at',null)->latest()->paginate(10);
        $s['job_placements']->getCollection()->transform(function ($jp) {
            $jp->jid = Crypt::encrypt($jp->id);
            return $jp;
        });
        return view('frontend.members.job_placement',$s);

    }
    public function job_index(){
        return view('frontend.members.job_index');
    }
    public function job_create(){
        return view('frontend.members.job_create');
    }
    public function cs_firm(): View
    {
        $query = CsFirms::with('member')->where('status',1)->where('deleted_at',null)->orderBy('private_practice_certificate_no','ASC');
        $s['csf_members'] = $query->limit(50)->get();
        return view('frontend.members.cs_firms',$s);

    }
    public function members_lounge(): View
    {
        return view('frontend.members.member_lounge');

    }
    public function corporate_leader(): View
    {
        return view('frontend.members.find_leader');

    }

    public function fj_store(JobPlacementRequest $request): RedirectResponse
    {
        $jp = new JobPlacement();
        $jp->title = $request->title;
        $jp->company_name = $request->company_name;
        $jp->company_url = $request->company_url;
        $jp->application_url = $request->application_url;
        $jp->job_type = $request->job_type;
        $jp->salary = json_encode($request->salary);
        $jp->salary_type = $request->salary_type;
        $jp->email = $request->email;
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

        $admin_subject = "New job posted on your job portal";
        $admin_mail =
        "
        <p>Job Title: $jp->title</p> <br>
        <p>Email: $jp->email</p> <br>
        <p>Details: </p> $jp->job_responsibility <br>
        ";
        $this->send_custom_email($admin_mail,$admin_subject, 'test.euitsols@gmail.com');

        return redirect()->back()->withStatus(__('Job post '.$request->title.' created successfully.'));
    }

    public function job_edit($id){
        $s['jp'] = JobPlacement::findOrFail(Crypt::decrypt($id));
        $s['id'] = Crypt::encrypt($s['jp']->id);
        if($s['jp']->status == 1){
            abort(404);
        }else{
            return view('frontend.members.job_edit',$s);
        }
    }
    public function fj_update(JobPlacementRequest $request, $id): RedirectResponse
    {
        $jp = JobPlacement::findOrFail(Crypt::decrypt($id));
        $jp->title = $request->title;
        $jp->company_name = $request->company_name;
        $jp->company_url = $request->company_url;
        $jp->application_url = $request->application_url;
        $jp->job_type = $request->job_type;
        $jp->salary = json_encode($request->salary);
        $jp->salary_type = $request->salary_type;
        $jp->email = $request->email;
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
        $jp->status = '0';
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
        $this->send_custom_email($admin_mail,$admin_subject, 'test.euitsols@gmail.com');
        return redirect()->route('member_view.job_edit',$id)->withStatus(__('Job post '.$request->title.' editted successfully.'));
    }
    public function job_details($id): View
    {
        $id = Crypt::decrypt($id);
        $s['job'] = JobPlacement::findOrFail($id);
        return view('frontend.members.job_details',$s);
    } 
}
