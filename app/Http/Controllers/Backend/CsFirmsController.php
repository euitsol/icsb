<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CsFirms;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class CsFirmsController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['cs_firms'] = CsFirms::with('member')->where('deleted_at',null)->latest()->get();
        return view('backend.member.cs_firms.index',$s);
    }
    public function create(): View
    {
        $s['members'] = Member::where('deleted_at', null)->where('status',1)->latest()->get();
        return view('backend.member.cs_firms.create',$s);
    }
    public function store(Request $request): RedirectResponse
    {
        $filteredInput = array_filter($request->csf_member, function ($entry) {
            return isset($entry['member_id']) && !is_null($entry['member_id']) &&
                   isset($entry['ppcn']) && !is_null($entry['ppcn']);
        });
        if($filteredInput){
            foreach($request->csf_member as $member){
                    $check = CsFirms::where('member_id',$member['member_id'])->first();
                    if(!$check){
                        $cs_fm = new CsFirms();
                        $cs_fm->member_id = $member['member_id'];
                        $cs_fm->private_practice_certificate_no = $member['ppcn'];
                        $cs_fm->created_by = auth()->user()->id;
                        $cs_fm->save();
                    }
            }
        }

        return redirect()->route('cs_firm.cs_firm_list')->withStatus(__('CS Firm Members created successfully.'));
    }

    public function edit($id): View
    {
        $s['csf_member'] = CsFirms::findOrFail($id);
        $s['members'] = Member::where('deleted_at', null)->where('status',1)->latest()->get();
        return view('backend.member.cs_firms.edit',$s);
    }
    public function update(Request $request, $id): RedirectResponse
    {



        $check = CsFirms::where('member_id',$request->csf_member['member_id'])->first();
        $cs_fm = CsFirms::findOrFail($id);
        if($check){
            return redirect()->route('cs_firm.cs_firm_list')->withStatus(__('CS Firm Member'.$check->member->name.' already exit can\'t update this.'));
        }else{
            $cs_fm->member_id = $request->csf_member['member_id'];
            $cs_fm->private_practice_certificate_no = $request->csf_member['ppcn'];
            $cs_fm->created_by = auth()->user()->id;
            $cs_fm->save();
        }


        return redirect()->route('cs_firm.cs_firm_list')->withStatus(__('CS Firm Member'.$cs_fm->member->id.'created successfully.'));
    }


    public function status($id): RedirectResponse
    {
        $csf_member = CsFirms::findOrFail($id);
        $this->statusChange($csf_member);
        return redirect()->route('cs_firm.cs_firm_list')->withStatus(__($csf_member->member->name.' status updated successfully.'));
    }

    public function delete($id): RedirectResponse
    {
        $csf_member = CsFirms::findOrFail($id);
        $this->soft_delete($csf_member);
        return redirect()->route('cs_firm.cs_firm_list')->withStatus(__($csf_member->member->name.' status deleted successfully.'));
    }
}