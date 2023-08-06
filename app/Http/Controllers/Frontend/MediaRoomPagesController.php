<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MemberType;
use Illuminate\Http\Request;
use App\Models\MediaRoom;
use App\Models\MediaRoomCategory;
use App\Models\CommitteeType;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class MediaRoomPagesController extends Controller
{
    public function __construct() {
        $contact = Contact::where('deleted_at', null)->first();
        $memberTypes = MemberType::where('deleted_at', null)->where('status', 1)->get();
        $committeeTypes = CommitteeType::with('committees')->where('deleted_at', null)->where('status', 1)->get();
        $mediaRoomCategory = MediaRoomCategory::with('media_rooms')->where('deleted_at', null)->where('status', 1)->get();
        view()->share([
            'contact' => $contact,
            'memberTypes' => $memberTypes,
            'committeeTypes' => $committeeTypes,
            'mediaRoomCategory' => $mediaRoomCategory,
        ]);
    }
    public function mr_all(): View
    {
        $s['media_rooms'] = MediaRoom::where('deleted_at', null)->where('permission','1')->latest()->get();
        return view('frontend.media_room.media_rooms',$s);
    }
    public function view($slug): View
    {
        $s['media_room'] = MediaRoom::where('deleted_at', null)->where('permission','1')->where('slug',$slug)->first();
        return view('frontend.media_room.view',$s);
    }
    public function cat_all($slug): View
    {
        $s['cat'] = MediaRoomCategory::with('media_rooms')->where('slug',$slug)->where('deleted_at', null)->where('status','1')->first();
        $s['media_rooms'] = MediaRoom::where('category_id',$s['cat']->id)->where('deleted_at', null)->where('permission','1')->latest()->get();
        return view('frontend.media_room.media_rooms',$s);
    }
}
