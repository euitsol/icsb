<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Act;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Models\Council;
use App\Models\Feedback;
use App\Models\MemberType;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Visitor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use App\Http\Traits\SendMailTrait;

class ContactPagesController extends Controller
{
    use SendMailTrait;
    public function __construct()
    {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->orderBy('order_key', 'ASC')->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->orderBy('order_key', 'ASC')->get();
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
        $menu_acts = Act::where('deleted_at', null)->where('status', 1)->orderBy('order_key', 'ASC')->get();
        $councils = Council::where('deleted_at', null)->where('status', 1)->orderBy('order_key', 'ASC')->get();
        ['totalVisitors' => $totalVisitors, 'todayVisitors' => $todayVisitors] = $this->getVisitorStats();
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
    public function feedback(): View
    {
        $contact = Contact::where('deleted_at', null)->first();
        $s['contact_numbers'] = collect(json_decode($contact->phone ?? ''))->groupBy('type');
        return view('frontend.contact.feedback', $s);
    }
    public function address(): View
    {
        $contact = Contact::where('deleted_at', null)->first();
        $s['contact_numbers'] = collect(json_decode($contact->phone ?? ''))->groupBy('type');
        return view('frontend.contact.address', $s);
    }
    public function socialPlatform(): View
    {
        $s['contact'] = Contact::where('deleted_at', null)->first();
        return view('frontend.contact.social_platforms', $s);
    }
    public function locationMap(): View
    {
        $s['contact'] = Contact::where('deleted_at', null)->first();
        return view('frontend.contact.map', $s);
    }
    public function feedbackStore(FeedbackRequest $req): RedirectResponse
    {
        $feedback = new Feedback();
        $feedback->name = $req->name;
        $feedback->email = $req->email;
        $feedback->phone = $req->phone;
        $feedback->subject = $req->subject;
        $feedback->message = $req->message;
        $feedback->save();
        $subject = "New feedback submitted: $feedback->subject";
        $mail =
            "
        <p>Sent From: $feedback->email</p> <br>
        <p>Name: $feedback->name</p> <br>
        <p>Phone: $feedback->phone</p> <br>
        <p>Feedback: $feedback->message</p> <br>
        ";
        $to = "itofficer@icsb.edu.bd";
        $this->send_custom_email($mail, $subject, $to);
        return redirect()->route('contact_us.feedback')->withStatus(__('Thank you for your feedback, we will get back to you as soon as possible.'));
    }

    public function appPlatform(): View
    {
        $s['download_url'] = SinglePages::where('frontend_slug', 'app-download-url')->first();
        return view('frontend.contact.app_platforms', $s);
    }
}
