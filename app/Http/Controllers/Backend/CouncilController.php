<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouncilMemberRequest;
use App\Http\Requests\CouncilMemberTypeRequest;
use App\Http\Requests\CouncilRequest;
use App\Models\Council;
use App\Models\CouncilMember;
use App\Models\CouncilMemberType;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class CouncilController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['cm_types'] = CouncilMemberType::with('council_member_type_members')->where('deleted_at',null)->latest()->get();
        $s['councils'] = Council::with('council_members')->where('deleted_at',null)->latest()->get();
        $s['c_members'] = CouncilMember::with(['council','council_member_type','member'])->where('deleted_at',null)->latest()->get();
        return view('backend.council_pages.council.index',$s);
    }
    public function create(): View
    {
        return view('backend.council_pages.council.create');
    }
    public function store(CouncilRequest $request): RedirectResponse
    {
        $council = new Council();
        $council->order_key = $request->order_key;
        $council->title = $request->title;
        $council->duration = json_encode($request->duration);
        $council->slug = $request->slug;
        $council->description = $request->description;
        $council->created_by = auth()->user()->id;
        $council->save();
        return redirect()->route('council.council_member_create',$council->id)->withStatus(__('Council'.$council->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['council'] = Council::findOrFail($id);
        return view('backend.council_pages.council.edit',$s);
    }
     public function update(CouncilRequest $request , $id): RedirectResponse
    {
        $council = Council::findOrFail($id);
        $council->order_key = $request->order_key;
        $council->title = $request->title;
        $council->duration = json_encode($request->duration);
        $council->slug = $request->slug;
        $council->description = $request->description;
        $council->updated_by = auth()->user()->id;
        $council->save();

        return redirect()->route('council.council_list')->withStatus(__('Council'.$council->title.' updated successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $council = Council::findOrFail($id);
        $this->statusChange($council);
        return redirect()->route('council.council_list')->withStatus(__($council->title.' status updated successfully.'));
    }

    public function delete($id): RedirectResponse
    {
        $council = Council::findOrFail($id);
        if($council->council_members->count() > 0){
            return redirect()->route('council.council_list')->withStatus(__($council->title.' has '.$council->council_members->count().' members assigned. Can\'t be deleted. Best option is to deactivate it.'));
        }
        $this->soft_delete($council);
        return redirect()->route('council.council_list')->withStatus(__($council->title.' deleted successfully.'));
    }


    public function cmt_create(): View
    {
        return view('backend.council_pages.council.cmt_create');
    }
    public function cmt_store(CouncilMemberTypeRequest $request): RedirectResponse
    {
        $cmt = new CouncilMemberType();
        $cmt->title = $request->title;
        $cmt->order_key = $request->order_key;
        $cmt->slug = $request->slug;
        $cmt->description = $request->description;
        $cmt->created_by = auth()->user()->id;
        $cmt->save();

        return redirect()->route('council.council_list')->withStatus(__('Council Type'.$cmt->title.' created successfully.'));
    }
    public function cmt_edit($id): View
    {
        $s['cmt'] = CouncilMemberType::findOrFail($id);
        return view('backend.council_pages.council.cmt_edit',$s);
    }
     public function cmt_update(CouncilMemberTypeRequest $request , $id): RedirectResponse
    {
        $cmt = CouncilMemberType::findOrFail($id);
        $cmt->order_key = $request->order_key;
        $cmt->title = $request->title;
        $cmt->slug = $request->slug;
        $cmt->description = $request->description;
        $cmt->updated_by = auth()->user()->id;
        $cmt->save();

        return redirect()->route('council.council_list')->withStatus(__('Council Type'.$cmt->title.' updated successfully.'));
    }
    public function cmt_status($id): RedirectResponse
    {
        $cmt = CouncilMemberType::findOrFail($id);
        $this->statusChange($cmt);
        return redirect()->route('council.council_list')->withStatus(__($cmt->title.' status updated successfully.'));
    }

    public function cmt_delete($id): RedirectResponse
    {
        $cmt = CouncilMemberType::findOrFail($id);
        if($cmt->council_member_type_members->count() > 0){
            return redirect()->route('council.council_list')->withStatus(__($cmt->title.' has '.$cmt->council_member_type_members->count().' members assigned. Can\'t be deleted. Best option is to deactivate it.'));
        }
        // $cmt->delete();
        $this->soft_delete($cmt);
        return redirect()->route('council.council_list')->withStatus(__($cmt->title.' deleted successfully.'));
    }

    public function cm_index($id): View
    {
        $s['council'] = Council::with('council_members')->where('deleted_at',null)->where('id',$id)->first();
        return view('backend.council_pages.council.cm_index',$s);
    }
    public function cm_create($id): View
    {
        $s['council'] = Council::findOrFail($id);
        $s['cm_types'] = CouncilMemberType::with('council_member_type_members')->where('deleted_at',null)->where('status',1)->latest()->get();
        $s['members'] = Member::with('type')->where('deleted_at',null)->where('status',1)->latest()->get();
        return view('backend.council_pages.council.cm_create',$s);
    }
    public function cm_store(CouncilMemberRequest $request, $id): RedirectResponse
    {

        $filteredInputs = array_filter($request->cm, function ($entry) {
            return isset($entry['member_id']) && !is_null($entry['member_id']) &&
                   isset($entry['cmt_id']) && !is_null($entry['cmt_id']);
        });

        if($filteredInputs){
            $council = Council::findOrFail($id);
            foreach($request->cm as $single_cm){
                $check = CouncilMember::where('member_id', $single_cm['member_id'])->where('council_id',$id)->first();
                $cm = new CouncilMember();
                if(empty($check)){
                    $cm->member_id = $single_cm['member_id'];
                    $cm->order_key = $single_cm['order_key'];
                    $cm->description = $single_cm['description'];
                    $cm->council_id = $id;
                    $cm->cmt_id = $single_cm['cmt_id'];
                    $cm->created_by = auth()->user()->id;
                    $cm->save();

                }else{
                    continue;
                }
            }
            return redirect()->route('council.council_member_list',$id)->withStatus(__($council->title.' member added successfully'));

        }

    }
    public function cm_edit($id): View
    {
        $s['cm_types'] = CouncilMemberType::with('council_member_type_members')->where('deleted_at',null)->where('status',1)->latest()->get();
        $s['members'] = Member::with('type')->where('deleted_at',null)->where('status',1)->latest()->get();
        $s['cm'] = CouncilMember::findOrFail($id);
        return view('backend.council_pages.council.cm_edit',$s);
    }
     public function cm_update(CouncilMemberRequest $request , $id): RedirectResponse
    {
        $cm = CouncilMember::findOrFail($id);
        if($request->member_id != $cm->member_id){
            $check = CouncilMember::where('member_id', $request->member_id)->where('council_id',$cm->council_id)->first();
        }
        if(empty($check)){
            $cm->member_id = $request->member_id;
            $cm->cmt_id = $request->cmt_id;
            $cm->order_key = $request->order_key;
            $cm->description = $request->description;
            $cm->updated_by = auth()->user()->id;
            $cm->save();
            return redirect()->route('council.council_member_list',$cm->council_id)->withStatus(__($cm->member->name.' has been appointed as the '.$cm->council_member_type->title.' of this council'));
        }
        else{
            return redirect()->route('council.council_member_list',$cm->council_id)->withStatus(__($check->member->name.' has already been appointed as the '.$check->council_member_type->title.' of this council.'));
        }

    }
    public function cm_status($id): RedirectResponse
    {
        $cm = CouncilMember::findOrFail($id);
        $this->statusChange($cm);
        return redirect()->route('council.council_member_list',$cm->council_id)->withStatus(__($cm->member->name.' status updated successfully.'));
    }

    public function cm_delete($id): RedirectResponse
    {
        $cm = CouncilMember::findOrFail($id);
        $this->soft_delete($cm);
        return redirect()->route('council.council_member_list',$cm->council_id)->withStatus(__($cm->council_id.' deleted successfully.'));
    }
}
