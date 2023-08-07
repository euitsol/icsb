<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\MediaRoomCategory;
use App\Models\MemberType;
use App\Models\SecretarialStandard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DefaultController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->get();
        $bsss = SecretarialStandard::where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
            'bsss' => $bsss,
        ]);
    }

    public function view_download($fileName): BinaryFileResponse
    {
        $fileName = base64_decode($fileName);
        $folderName = strstr($fileName, '/', true);
        $downloadPath = substr($fileName, strlen($folderName.'/'));
        $filePath = storage_path('app/public/'.$folderName.'/'.$downloadPath);
        if (file_exists($filePath)) {
            return response()->download($filePath, $downloadPath);
        } else {
            return redirect()->back();
        }
    }
}
