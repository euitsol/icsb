<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Council;
use App\Models\MediaRoomCategory;
use App\Models\MemberType;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use App\Models\Visitor;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DefaultController extends Controller
{
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
    // public function view_download($fileName): BinaryFileResponse
    // {
    //     $fileName = base64_decode($fileName);
    //     $folderName = strstr($fileName, '/', true);
    //     $downloadPath = substr($fileName, strlen($folderName.'/'));
    //     $filePath = storage_path('app/public/'.$folderName.'/'.$downloadPath);
    //     if (file_exists($filePath)) {
    //         return response()->download($filePath, $downloadPath);
    //     } else {
    //         return redirect()->back();
    //     }
    // }
    public function view_download($encodedPath): BinaryFileResponse
    {
        $filePath = base64_decode($encodedPath);
        $pathParts = collect(explode('/', $filePath));
        $fileName = $pathParts->pop();
        $folderName = $pathParts->implode('/');

        $fullPath = storage_path('app/public/' . $folderName . '/' . $fileName);

        if (file_exists($fullPath)) {
            return response()->download($fullPath, $fileName);
        } else {
            return redirect()->back()->withStatus(__('File not found'));
        }
    }


    public function view_pdf($filePath){
        $file_path = base64_decode($filePath);
        $file_path = storage_path('app/public/'.$file_path);
        if($file_path != null){
            if(file_exists($file_path)){
                 return response()->file($file_path, ['Content-Type' => 'application/pdf']);
            }
        }
    }
}
