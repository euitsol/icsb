<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Member;
use App\Models\MemberType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberTypeRequest;

class MemberController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index():View
    {
        $members = Member::with(['user', 'type'])->where('deleted_at', null)->latest()->get();
        $types = MemberType::with(['members'])->where('deleted_at', null)->orderBy('order_key','ASC')->get();

        return view('backend.member.index',['members' => $members, 'types' => $types]);
    }

    public function create():View
    {
        $types = MemberType::where('deleted_at', null)->where('status', 1)->latest()->get();

        return view('backend.member.create', ['types' => $types]);
    }

    public function store(MemberRequest $request): RedirectResponse
    {
        $member = new Member;
        $member->membership_id = $request->membership_id;
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->member_type = $request->member_type;
        $member->email = $request->member_email;
        $member->address = $request->address;
        $member->details = $request->description;
        $member->phone = json_encode($request->phone);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('member', 'public');
            $member->image = $path;
        }

        $user = $this->create_user($request->name, $request->member_email, null, 5);

        $member->user_id = $user->id;
        $member->created_by = auth()->user()->id;
        $member->save();

        return redirect()->route('member.member_list')->withStatus(__('Member '.$member->name.' created successfully.'));
    }

    public function edit($id):View
    {
        $types = MemberType::where('deleted_at', null)->where('status', 1)->latest()->get();
        $member = Member::with(['type'])->findOrFail($id);

        return view('backend.member.edit', ['types' => $types, 'member' => $member]);
    }

    public function update(MemberRequest $request, $id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->name = $request->name;
        $member->membership_id = $request->membership_id;
        $member->designation = $request->designation;
        $member->member_type = $request->member_type;
        $member->email = $request->member_email;
        $member->address = $request->address;
        $member->details = $request->description;
        $member->phone = json_encode($request->phone);

        if ($request->hasFile('image')) {
            if(!empty($member->image)){
                $this->fileDelete($member->image);
            }
            $image = $request->file('image');
            $path = $image->store('member', 'public');
            $member->image = $path;
        }

        if($member->email != $request->email){
            $user = $this->edit_user($member->user_id, null, $request->member_email, null, null);
        }


        if($member->name != $request->name){
            $user = $this->edit_user($member->user_id, $request->name, null, null, null);
        }

        $member->user_id = $user->id;
        $member->updated_by = auth()->user()->id;
        $member->save();

        return redirect()->route('member.member_list')->withStatus(__('Member '.$member->name.' updated successfully.'));
    }

    public function status($id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $this->statusChange($member);
        return redirect()->route('member.member_list')->withStatus(__($member->title.' status updated successfully.'));
    }

    public function delete($id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        if(!empty($member->image)){
            $this->fileDelete($member->image);
        }
        $this->soft_delete($member);
        return redirect()->route('member.member_list')->withStatus(__($member->title.' status deleted successfully.'));
    }

    public function mt_create():View
    {
        return view('backend.member.type_create');
    }

    public function mt_store(MemberTypeRequest $request): RedirectResponse
    {
        $type = new MemberType;
        $type->order_key = $request->order_key;
        $type->title = $request->title;
        $type->slug = $request->slug;
        $type->description = $request->description;
        $type->created_by = auth()->user()->id;
        $type->save();

        return redirect()->route('member.member_list')->withStatus(__('Member Type '.$type->title.' created successfully.'));
    }

    public function mt_edit($id):View
    {
        $type = MemberType::findOrFail($id);
        return view('backend.member.type_edit',['type' => $type]);
    }

    public function mt_update(MemberTypeRequest $request, $id): RedirectResponse
    {
        $type = MemberType::findOrFail($id);
        $type->order_key = $request->order_key;
        $type->title = $request->title;
        $type->slug = $request->slug;
        $type->description = $request->description;
        $type->updated_by = auth()->user()->id;
        $type->save();

        return redirect()->route('member.member_list')->withStatus(__('Member Type '.$type->title.' updated successfully.'));
    }

    public function mt_status($id): RedirectResponse
    {
        $type = MemberType::findOrFail($id);
        $this->statusChange($type);
        return redirect()->route('member.member_list')->withStatus(__($type->title.' status updated successfully.'));
    }

    public function mt_delete($id): RedirectResponse
    {
        $type = MemberType::findOrFail($id);
        if($type->members->count() > 0){
            // if($type->id == 5){
            //     return redirect()->route('member.member_list')->withStatus(__($type->title.' member type can\'t be deleted because this member type is created by the system!'));
            // }else{
                return redirect()->route('member.member_list')->withStatus(__($type->title.' has '.$type->members->count().' members assigned. Can\'t be deleted. Best option is to deactivate it.'));
            // }

        }
        $this->soft_delete($type);
        return redirect()->route('member.member_list')->withStatus(__($type->title.' status deleted successfully.'));
    }

}
