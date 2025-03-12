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
use App\Models\Event;
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
use App\Models\JobPlacement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class AjaxController extends Controller
{
    public function __construct() {}
    public function noticeHome($id): JsonResponse
    {
        $notice_cat = '';
        if ($id != 0) {
            $notice_cat =  NoticeCategory::findOrFail($id);
            $notices = Notice::with('category')->where('cat_id', $notice_cat->id)->where('deleted_at', null)->where('status', 1)->orderBy('release_date', 'DESC')->limit(4)->get()
                ->map(function ($notice) {
                    $notice->date = date('M d, Y', strtotime($notice->release_date));
                    $notice->time = date('h:i A', strtotime($notice->release_date));
                    return $notice;
                });
        } else {
            $notices = Notice::with('category')->where('deleted_at', null)->where('status', 1)->orderBy('release_date', 'DESC')->limit(4)->get()
                ->map(function ($notice) {
                    $notice->date = date('M d, Y', strtotime($notice->release_date));
                    $notice->time = date('h:i A', strtotime($notice->release_date));
                    return $notice;
                });
        }

        return response()->json(['notices' => $notices, 'notice_cat' => $notice_cat]);
    }
    public function awards($offset): JsonResponse
    {
        $awards = NationalAward::where('deleted_at', null)->where('status', 1)->latest()->offset($offset)->limit(12)->get();
        return response()->json(['awards' => $awards]);
    }
    public function convocations($offset): JsonResponse
    {
        $convocations = Convocation::where('deleted_at', null)->where('status', 1)->latest()->offset($offset)->limit(12)->get();
        return response()->json(['convocations' => $convocations]);
    }
    public function notices($offset, $slug = null): JsonResponse
    {
        if ($slug !== null) {
            $s['notice_cat'] = NoticeCategory::where('slug', $slug)->where('deleted_at', null)->first();
            if (!empty($s['notice_cat'])) {
                $s['notices'] = Notice::where('cat_id', $s['notice_cat']->id)->where('deleted_at', null)->where('status', 1)->orderBy('release_date', 'DESC')->offset($offset)->limit(12)->get();
            } else {
                $s['notices'] = Notice::where('slug', $slug)->where('deleted_at', null)->where('status', 1)->orderBy('release_date', 'DESC')->offset($offset)->limit(12)->get();
            }
        } else {
            $s['notices'] = Notice::where('deleted_at', null)->where('status', 1)->orderBy('release_date', 'DESC')->offset($offset)->limit(12)->get();
        }
        $s['notices'] = $s['notices']->map(function ($notice) {
            $notice->release_date = date('d M Y', strtotime($notice->created_at));
            return $notice;
        });
        return response()->json($s);
    }
    // public function singlePageSeeMore($slug,$offset): JsonResponse
    // {
    //     $results = SinglePages::where('frontend_slug', $slug)->first();
    //     if(isset(json_decode($results->saved_data)->{'upload-files'})){
    //         $files = array_reverse((array)json_decode($results->saved_data)->{'upload-files'});
    //         return response()->json(['files'=>$files]);
    //     }
    // }
    public function singlePageSeeMore($slug, $offset, $limit = 12): JsonResponse
    {
        $results = SinglePages::where('frontend_slug', $slug)->first();

        if ($results) {
            $savedData = json_decode($results->saved_data);

            if (isset($savedData->{'upload-files'})) {
                $files = (array) $savedData->{'upload-files'};
                $offset = intval($offset);
                $files = array_reverse((array) $files);
                $files = array_slice($files, $offset, $limit);


                return response()->json(['files' => $files]);
            }
        }
        return response()->json(['files' => []]);
    }
    public function mediaRooms($id, $offset): JsonResponse
    {

        $media_rooms = '';
        if ($id != 'all') {
            $query = MediaRoom::where('category_id', $id)->where('deleted_at', null)->where('permission', '1')->orderBy('program_date', 'DESC');
            $media_rooms = $query->offset($offset)->limit(12)->get()
                ->map(function ($media_room) {
                    $media_room->date = date('d M Y', strtotime($media_room->program_date));
                    $media_room->title = stringLimit($media_room->title);
                    $media_room->description = stringLimit(html_entity_decode_table($media_room->description));
                    return $media_room;
                });
        } else {
            $query = MediaRoom::where('deleted_at', null)->where('permission', '1')->orderBy('program_date', 'DESC');
            $media_rooms = $query->offset($offset)->limit(12)->get()
                ->map(function ($media_room) {
                    $media_room->date = date('d M Y', strtotime($media_room->program_date));
                    $media_room->title = stringLimit($media_room->title);
                    $media_room->description = stringLimit(html_entity_decode_table($media_room->description));
                    return $media_room;
                });
        }
        return response()->json(['media_rooms' => $media_rooms]);
    }
    public function csFirms($offset)
    {
        $query = CsFirms::with('member')->where('status', 1)->where('deleted_at', null)->orderBy('private_practice_certificate_no', 'ASC');
        $csFirmMembers = $query->offset($offset)->limit(50)->get()->map(function ($csFirmMember) {
            $csFirmMember->member->image = getMemberImage($csFirmMember->member);
            return $csFirmMember;
        });
        return response()->json(['csFirmMembers' => $csFirmMembers]);
    }
    public function events($offset): JsonResponse
    {

        $query = Event::where('deleted_at', null)->where('status', '1')->orderBy('event_start_time', 'DESC');
        $events = $query->offset($offset)->limit(12)->get()
            ->map(function ($event) {
                $event->event_start_time = date('d-M-Y', strtotime($event->event_start_time));
                $event->title = stringLimit($event->title, 80);
                return $event;
            });
        return response()->json(['events' => $events]);
    }
    public function cs_firms_member_search($search_value): JsonResponse
    {
        $csFirmMembers = CsFirms::whereHas('member', function ($query) use ($search_value) {
            $query->where('name', 'like', '%' . $search_value . '%')
                ->orWhere('designation', 'like', '%' . $search_value . '%')
                ->orWhere('company_name', 'like', '%' . $search_value . '%')
                ->where('mem_current_status', 1);
        })
            ->orWhere('private_practice_certificate_no', 'like', '%' . $search_value . '%')
            ->with('member') // Eager load the associated member data
            ->get()->map(function ($csFirmMember) {
                $csFirmMember->member->image = getMemberImage($csFirmMember->member);
                return $csFirmMember;
            });
        return response()->json(['csFirmMembers' => $csFirmMembers]);
    }
    public function member_search($search_value, $cat_id): JsonResponse
    {
        switch ($cat_id) {
            case 'honorary':
                $search = Member::where('mem_current_status', 1)->where('honorary', 1);
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
                ->orWhere('membership_id', 'like', '%' . $search_value . '%')
                ->orWhere('company_name', 'like', '%' . $search_value . '%');
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
                ->orWhere('membership_id', 'like', '%' . $search_value . '%')
                ->orWhere('company_name', 'like', '%' . $search_value . '%');
        })->where('mem_current_status', 1)
            ->get()
            ->map(function ($member_search) {
                $member_search->image = getMemberImage($member_search);
                return $member_search;
            })
            ->map(function ($m_search) {
                $m_search->type = $m_search->member_type();
                return $m_search;
            });
        return response()->json(['member_searchs' => $member_searchs]);
    }

    public function memberInfo($id, $cmId = null): JsonResponse
    {
        if ($cmId != null) {
            $council = CouncilMember::findOrFail($cmId);
        }

        $member = Member::findOrFail($id);
        $member_id = member_id($member->id);
        $phone = json_decode($member->phone);

        return response()->json(['member' => $member, 'member_id' => $member_id, 'phone' => $phone, 'council' => $council ?? '',]);
    }

    public function job_search($search_value, $category): JsonResponse
    {
        $today = Carbon::now()->format('Y-m-d');
        $jobs = JobPlacement::where('status', '1')
            ->where('deadline', '>=', $today)
            ->when((!empty($category) && $category != 'all'), function ($query) use ($category) {
                return $query->where('category', '=', $category);
            })
            ->where(function ($query) use ($search_value) {
                $query->where('title', 'like', '%' . $search_value . '%')
                    ->orWhere('company_name', 'like', '%' . $search_value . '%')
                    ->orWhere('job_type', 'like', '%' . $search_value . '%')
                    ->orWhere('salary_type', 'like', '%' . $search_value . '%')
                    ->orWhere('company_address', 'like', '%' . $search_value . '%')
                    ->orWhere('job_location', 'like', '%' . $search_value . '%');
            })
            ->latest()
            ->get();
        $jobs = $jobs->map(function ($job) {
            $job->jid = Crypt::encrypt($job->id);
            $job->created_at = date('d-M-Y', strtotime($job->created_at));
            $job->deadline = date('d-M-Y', strtotime($job->deadline));
            $job->createDiffTime = Carbon::parse($job->created_at)->diffForHumans();
            return $job;
        });
        return response()->json(['jobs' => $jobs]);
    }
}