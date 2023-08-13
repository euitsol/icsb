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
        $filteredInput = array_filter($request->cs_member, function ($entry) {
            return isset($entry['member_id']) && !is_null($entry['member_id']) &&
                   isset($entry['ppcn']) && !is_null($entry['ppcn']);
        });
        if($filteredInput){
            foreach($request->cs_member as $member){
                    $cs_fm = new CsFirms();
                    $cs_fm->member_id = $member['member_id'];
                    $cs_fm->private_practice_certificate_no = $member['ppcn'];
                    $cs_fm->created_by = auth()->user()->id;
                    $cs_fm->save();
            }
        }

        return redirect()->route('member.member_list')->withStatus(__('Member '.$member->name.' created successfully.'));
    }
}
