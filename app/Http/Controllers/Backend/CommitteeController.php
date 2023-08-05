<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\CommitteeMemberType;
use App\Models\CommitteeType;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use App\Http\Requests\CommitteeMemberRequest;
use App\Http\Requests\CommitteeMemberTypeRequest;
use App\Http\Requests\CommitteeRequest;
use App\Http\Requests\CommitteeTypeRequest;

class CommitteeController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $s['cm_types'] = CommitteeMemberType::with('committe_member_type_members')->where('deleted_at',null)->latest()->get();
        $s['c_types'] = CommitteeType::with('committees')->where('deleted_at',null)->latest()->get();
        $s['committees'] = Committee::with(['committe_type','committe_members'])->where('deleted_at',null)->latest()->get();
        $s['c_members'] = CommitteeMember::with(['committe','committe_member_type','member'])->where('deleted_at',null)->latest()->get();
        return view('backend.council_pages.committee.index',$s);
    }
    public function create(): View
    {
        $s['c_types'] = CommitteeType::where('deleted_at', null)->where('status',1)->latest()->get();
        return view('backend.council_pages.committee.create',$s);
    }
    public function store(CommitteeRequest $request): RedirectResponse
    {
        $committee = new Committee();
        $committee->title = $request->title;
        $committee->committee_type = $request->committee_type;
        $committee->slug = $request->slug;
        $committee->description = $request->description;
        $committee->created_by = auth()->user()->id;
        $committee->save();
        return redirect()->route('committee.committee_member_create',$committee->id)->withStatus(__('Committee'.$committee->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['committee'] = Committee::findOrFail($id);
        $s['c_types'] = CommitteeType::where('deleted_at', null)->where('status',1)->latest()->get();
        return view('backend.council_pages.committee.edit',$s);
    }
     public function update(CommitteeRequest $request , $id): RedirectResponse
    {
        $committee = Committee::findOrFail($id);
        $committee->title = $request->title;
        $committee->committee_type = $request->committee_type;
        $committee->slug = $request->slug;
        $committee->description = $request->description;
        $committee->updated_by = auth()->user()->id;
        $committee->save();

        return redirect()->route('committee.committee_list')->withStatus(__('Committee Type'.$committee->title.' updated successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $committee = Committee::findOrFail($id);
        $this->statusChange($committee);
        return redirect()->route('committee.committee_list')->withStatus(__($committee->title.' status updated successfully.'));
    }

    public function delete($id): RedirectResponse
    {
        $committee = Committee::findOrFail($id);
        if($committee->committe_members->count() > 0){
            return redirect()->route('committee.committee_list')->withStatus(__($committee->title.' has '.$committee->committe_members->count().' members assigned. Can\'t be deleted. Best option is to deactivate it.'));
        }
        $this->soft_delete($committee);
        return redirect()->route('committee.committee_list')->withStatus(__($committee->title.' status deleted successfully.'));
    }



    public function ct_create(): View
    {
        return view('backend.council_pages.committee.ct_create');
    }
    public function ct_store(CommitteeTypeRequest $request): RedirectResponse
    {
        $ct = new CommitteeType();
        $ct->title = $request->title;
        $ct->slug = $request->slug;
        $ct->description = $request->description;
        $ct->created_by = auth()->user()->id;
        $ct->save();

        return redirect()->route('committee.committee_list')->withStatus(__('Committee Type'.$ct->title.' created successfully.'));
    }
    public function ct_edit($id): View
    {
        $s['ct'] = CommitteeType::findOrFail($id);
        return view('backend.council_pages.committee.ct_edit',$s);
    }
     public function ct_update(CommitteeTypeRequest $request , $id): RedirectResponse
    {
        $ct = CommitteeType::findOrFail($id);
        $ct->title = $request->title;
        $ct->slug = $request->slug;
        $ct->description = $request->description;
        $ct->updated_by = auth()->user()->id;
        $ct->save();

        return redirect()->route('committee.committee_list')->withStatus(__('Committee Type'.$ct->title.' updated successfully.'));
    }
    public function ct_status($id): RedirectResponse
    {
        $ct = CommitteeType::findOrFail($id);
        $this->statusChange($ct);
        return redirect()->route('committee.committee_list')->withStatus(__($ct->title.' status updated successfully.'));
    }

    public function ct_delete($id): RedirectResponse
    {
        $ct = CommitteeType::findOrFail($id);
        if($ct->committees->count() > 0){
            return redirect()->route('committee.committee_list')->withStatus(__($ct->title.' has '.$ct->committees->count().' committees assigned. Can\'t be deleted. Best option is to deactivate it.'));
        }
        $this->soft_delete($ct);
        return redirect()->route('committee.committee_list')->withStatus(__($ct->title.' status deleted successfully.'));
    }

    public function cmt_create(): View
    {
        return view('backend.council_pages.committee.cmt_create');
    }
    public function cmt_store(CommitteeMemberTypeRequest $request): RedirectResponse
    {
        $cmt = new CommitteeMemberType();
        $cmt->title = $request->title;
        $cmt->slug = $request->slug;
        $cmt->description = $request->description;
        $cmt->created_by = auth()->user()->id;
        $cmt->save();

        return redirect()->route('committee.committee_list')->withStatus(__('Committee Type'.$cmt->title.' created successfully.'));
    }
    public function cmt_edit($id): View
    {
        $s['cmt'] = CommitteeMemberType::findOrFail($id);
        return view('backend.council_pages.committee.cmt_edit',$s);
    }
     public function cmt_update(CommitteeMemberTypeRequest $request , $id): RedirectResponse
    {
        $cmt = CommitteeMemberType::findOrFail($id);
        $cmt->title = $request->title;
        $cmt->slug = $request->slug;
        $cmt->description = $request->description;
        $cmt->updated_by = auth()->user()->id;
        $cmt->save();

        return redirect()->route('committee.committee_list')->withStatus(__('Committee Type'.$cmt->title.' updated successfully.'));
    }
    public function cmt_status($id): RedirectResponse
    {
        $cmt = CommitteeMemberType::findOrFail($id);
        $this->statusChange($cmt);
        return redirect()->route('committee.committee_list')->withStatus(__($cmt->title.' status updated successfully.'));
    }

    public function cmt_delete($id): RedirectResponse
    {
        $cmt = CommitteeMemberType::findOrFail($id);
        if($cmt->committe_member_type_members->count() > 0){
            return redirect()->route('committee.committee_list')->withStatus(__($cmt->title.' has '.$cmt->committe_member_type_members->count().' members assigned. Can\'t be deleted. Best option is to deactivate it.'));
        }
        $this->soft_delete($cmt);
        return redirect()->route('committee.committee_list')->withStatus(__($cmt->title.' status deleted successfully.'));
    }

    public function cm_index($id): View
    {
        $s['committee'] = Committee::with(['committe_type','committe_members'])->where('deleted_at',null)->where('id',$id)->first();
        return view('backend.council_pages.committee.cm_index',$s);
    }
    public function cm_create($id): View
    {
        $s['committee'] = Committee::findOrFail($id);
        $s['cm_types'] = CommitteeMemberType::with('committe_member_type_members')->where('deleted_at',null)->where('status',1)->latest()->get();
        $s['members'] = Member::with('type')->where('deleted_at',null)->where('status',1)->latest()->get();
        return view('backend.council_pages.committee.cm_create',$s);
    }
    public function cm_store(CommitteeMemberRequest $request, $id): RedirectResponse
    {

        $filteredInputs = array_filter($request->cm, function ($entry) {
            return isset($entry['member_id']) && !is_null($entry['member_id']) &&
                   isset($entry['cmt_id']) && !is_null($entry['cmt_id']);
        });

        if($filteredInputs){
            $committee = Committee::findOrFail($id);
            foreach($request->cm as $single_cm){
                $check = CommitteeMember::where('member_id', $single_cm['member_id'])->where('committee_id',$id)->first();
                $cm = new CommitteeMember();
                if(empty($check)){
                    $cm->member_id = $single_cm['member_id'];
                    $cm->committee_id = $id;
                    $cm->cmt_id = $single_cm['cmt_id'];
                    $cm->created_by = auth()->user()->id;
                    $cm->save();

                }else{
                    continue;
                }
            }
            return redirect()->route('committee.committee_member_list',$id)->withStatus(__($committee->title.' member added successfully'));

        }

    }
    public function cm_edit($id): View
    {
        $s['cm_types'] = CommitteeMemberType::with('committe_member_type_members')->where('deleted_at',null)->where('status',1)->latest()->get();
        $s['members'] = Member::with('type')->where('deleted_at',null)->where('status',1)->latest()->get();
        $s['cm'] = CommitteeMember::findOrFail($id);
        return view('backend.council_pages.committee.cm_edit',$s);
    }
     public function cm_update(CommitteeMemberRequest $request , $id): RedirectResponse
    {
        $cm = CommitteeMember::findOrFail($id);
        if($request->member_id != $cm->member_id){
            $check = CommitteeMember::where('member_id', $request->member_id)->where('committee_id',$cm->committee_id)->first();
        }
        if(empty($check)){
            $cm->member_id = $request->member_id;
            $cm->cmt_id = $request->cmt_id;
            $cm->updated_by = auth()->user()->id;
            $cm->save();
            return redirect()->route('committee.committee_member_list',$cm->committee_id)->withStatus(__($cm->member->name.' assigned updated in this committee as a '.$cm->committe_member_type->title.' successfully'));
        }
        else{
            return redirect()->route('committee.committee_member_list',$cm->committee_id)->withStatus(__($check->member->name.' already assigned in this committee as a '.$check->committe_member_type->title.'. Can\'t update this member!'));
        }

    }
    public function cm_status($id): RedirectResponse
    {
        $cm = CommitteeMember::findOrFail($id);
        $this->statusChange($cm);
        return redirect()->route('committee.committee_member_list',$cm->committee_id)->withStatus(__($cm->member->name.' status updated successfully.'));
    }

    public function cm_delete($id): RedirectResponse
    {
        $cm = CommitteeMember::findOrFail($id);
        // $this->soft_delete($cmt);
        $cm->delete();
        return redirect()->route('committee.committee_member_list',$cm->committee_id)->withStatus(__($cm->committee_id.' deleted successfully.'));
    }


}
