<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\CommitteeType;
use App\Models\Contact;
use App\Models\Convocation;
use App\Models\Council;
use App\Models\CsFirms;
use App\Models\MediaRoom;
use App\Models\MediaRoomCategory;
use App\Models\Member;
use App\Models\CouncilMember;
use App\Models\MemberType;
use App\Models\NationalAward;
use App\Models\Notice;
use App\Models\NoticeCategory;
use App\Models\SecretarialStandard;
use App\Models\SinglePages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class AjaxController extends Controller
{
    public function __construct() {

    }
    public function noticeHome($id): JsonResponse
    {
        $notice_cat = '';
        if($id != 0){
            $notice_cat=  NoticeCategory::findOrFail($id);
            $notices = Notice::with('category')->where('cat_id',$notice_cat->id)->where('deleted_at',null)->where('status',1)->latest()->limit(4)->get()
            ->map(function ($notice) {
                $notice->date = date('M d, Y', strtotime($notice->created_at));
                $notice->time = date('H:i A', strtotime($notice->created_at));
                return $notice;
            });
        }else{
            $notices = Notice::with('category')->where('deleted_at',null)->where('status',1)->latest()->limit(4)->get()
            ->map(function ($notice) {
                $notice->date = date('M d, Y', strtotime($notice->created_at));
                $notice->time = date('H:i A', strtotime($notice->created_at));
                return $notice;
            });
        }

        return response()->json(['notices'=>$notices, 'notice_cat'=>$notice_cat]);
    }
    public function awards($offset): JsonResponse
    {
            $awards = NationalAward::where('deleted_at',null)->where('status',1)->latest()->offset($offset)->limit(12)->get();
            return response()->json(['awards'=>$awards]);
    }
    public function convocations($offset): JsonResponse
    {
            $convocations = Convocation::where('deleted_at',null)->where('status',1)->latest()->offset($offset)->limit(12)->get();
            return response()->json(['convocations'=>$convocations]);
    }
    public function mediaRooms($id,$offset): JsonResponse
    {

        $media_rooms = '';
        if($id != 'all'){
            $query = MediaRoom::where('category_id',$id)->where('deleted_at', null)->where('permission','1')->orderBy('program_date','DESC');
            $media_rooms = $query->offset($offset)->limit(12)->get()
            ->map(function ($media_room) {
                $media_room->date = date('d M Y', strtotime($media_room->program_date));
                $media_room->title = stringLimit($media_room->title);
                $media_room->description = stringLimit(html_entity_decode_table($media_room->description));
                return $media_room;
            });
        }else{
            $query = MediaRoom::where('deleted_at', null)->where('permission','1')->orderBy('program_date','DESC');
            $media_rooms = $query->offset($offset)->limit(12)->get()
            ->map(function ($media_room) {
                $media_room->date = date('d M Y', strtotime($media_room->program_date));
                $media_room->title = stringLimit($media_room->title);
                $media_room->description = stringLimit(html_entity_decode_table($media_room->description));
                return $media_room;
            });
        }
        return response()->json(['media_rooms'=>$media_rooms]);
    }
    public function singlePageSeeMore($slug): JsonResponse
    {
        $results = SinglePages::where('frontend_slug', $slug)->first();
        if(isset(json_decode($results->saved_data)->{'upload-files'})){
            $files = array_reverse((array)json_decode($results->saved_data)->{'upload-files'});
            return response()->json(['files'=>$files]);
        }
    }
    public function cs_firms_member_search($search_value): JsonResponse
    {
        $csFirmMembers = CsFirms::whereHas('member', function ($query) use ($search_value) {
            $query->where('name', 'like', '%' . $search_value . '%')
                ->orWhere('designation', 'like', '%' . $search_value . '%');
        })
        ->with('member') // Eager load the associated member data
        ->get()->map(function ($csFirmMember) {
            $csFirmMember->member->image = getMemberImage($csFirmMember->member);
            return $csFirmMember;
        });
        return response()->json(['csFirmMembers'=>$csFirmMembers]);
    }
    public function member_search($search_value, $cat_id): JsonResponse
    {
        switch ($cat_id) {
            case 'honorary':
                $search = Member::where('status', 1)->where('member_type', 2);
                break;

            case 'fellow':
                $search = Member::where('mem_current_status', 1)->where('type', 1);
                break;

            case 'associate':
                $search = Member::where('mem_current_status', 1)->where('type', 0);
                break;

            case 'deceased':
                $search = Member::where('mem_current_status', 3);
                break;

            default:
                $search = Member::where('deleted_at', null);
                break;
        }

        $search->where(function ($query) use ($search_value) {
            $query->where('name', 'like', '%' . $search_value . '%')
                ->orWhere('designation', 'like', '%' . $search_value . '%')
                ->orWhere('membership_id', 'like', '%' . $search_value . '%');
        });

        $member_searchs = $search->latest()->get()->map(function ($member_search) {
            $member_search->image = getMemberImage($member_search);
            return $member_search;
        });;
        return response()->json(['member_searchs' => $member_searchs]);
    }
    public function corporate_leader($search_value): JsonResponse
    {
        $member_searchs = Member::where(function ($query) use ($search_value) {
            $query->where('name', 'like', '%' . $search_value . '%')
                ->orWhere('designation', 'like', '%' . $search_value . '%')
                ->orWhere('membership_id', 'like', '%' . $search_value . '%');
        })
        ->with('type')
        ->get()
        ->map(function ($member_search) {
            $member_search->image = getMemberImage($member_search);
            return $member_search;
        });
        return response()->json(['member_searchs' => $member_searchs]);
    }

    public function memberInfo($id, $cmId = null): JsonResponse
    {
        if($cmId != null){
            $council = CouncilMember::findOrFail($cmId);
        }

        $member = Member::findOrFail($id);
        $member_id = member_id($member->id);
        $phone = json_decode($member->phone);

        return response()->json(['member'=>$member,'member_id'=>$member_id,'phone'=>$phone, 'council'=>$council ?? '',]);
    }
}
