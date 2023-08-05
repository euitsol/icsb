<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\President;
use Carbon\Carbon;
use App\Models\PresidentDuration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class PresidentController extends Controller
{

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $checks= PresidentDuration::where('end_date','<=',Carbon::now())->get();
        foreach($checks as $check){
                $p = President::findOrFail($check->president->id);
                if($p->status == 1){
                    $p->status = 1;
                    $p->save();
                }
        }
        $s['presidents'] = President::with(['durations','member'])->where('deleted_at', null)->latest()->get();
        return view('backend.council_pages.president.index',$s);
    }
    public function create(): View
    {
        $s['members'] = Member::where('status',1)->where('deleted_at', null)->latest()->get();
        return view('backend.council_pages.president.create',$s);
    }
    public function store(Request $request): RedirectResponse
    {
        foreach ($request->duration as $key => $duration) {
            if(empty($duration['end_date'])){
                $check = PresidentDuration::where('end_date',null)->first();
                if($check){
                    $check->end_date = Carbon::now();
                    $check->save();
                    $p = President::findOrFail($check->president->id);
                    $p->status = 0;
                    $p->save();
                }
            }
        }
        $president = new President;
        $president->member_id = $request->member_id;
        $president->slug = $request->slug.'-'.$request->member_id;
        $president->bio = $request->bio;
        $president->message = $request->message;
        $president->created_by = auth()->user()->id;
        $president->save();

        foreach ($request->duration as $key => $duration) {
            $pd= new PresidentDuration();
            $pd->president_id = $president->id;
            $pd->start_date = $duration['start_date'];
            if($duration['end_date']){
                $p = President::findOrFail($president->id);
                $p->status = 0;
                $p->save();
            }
            $pd->end_date = $duration['end_date'];
            $pd->created_by = auth()->user()->id;
            $pd->save();
        }
        return redirect()->route('president.president_list')->withStatus(__('President '.$president->member->name.' added successfully.'));
    }
    public function edit($id):View
    {
        $s['members'] = Member::where('status',1)->where('deleted_at', null)->latest()->get();
        $s['president'] = President::with(['durations','member'])->findOrFail($id);

        return view('backend.council_pages.president.edit',$s);
    }
    public function update(Request $request, $id): RedirectResponse
    {
        foreach ($request->duration as $key => $duration) {
            if(empty($duration['end_date'])){
                $check = PresidentDuration::where('end_date',null)->first();
                if($check){
                    $check->end_date = Carbon::now();
                    $check->save();
                    $p = President::findOrFail($check->president->id);
                    $p->status = 0;
                    $p->save();
                }
            }
        }
        $president = President::findOrFail($id);
        $president->member_id = $request->member_id;
        $president->slug = $request->slug.'-'.$request->member_id;
        $president->bio = $request->bio;
        $president->message = $request->message;
        $president->created_by = auth()->user()->id;
        $president->update();

        foreach ($request->duration as $key => $duration) {
            if($duration['end_date']){
                $check= PresidentDuration::where('end_date',null)->where('president_id',$id)->first();
                if($check){
                    $check->end_date = $duration['end_date'];
                    $check->save();
                    if($duration['end_date'] >= Carbon::now()){
                        $p = President::findOrFail($check->president->id);
                        $p->status = 0;
                        $p->save();
                    }

                }
            }else{
                    $pd= new PresidentDuration();
                    $pd->president_id = $id;
                    $pd->start_date = $duration['start_date'];
                    if(empty($duration['end_date'])){
                        $p = President::findOrFail($id);
                        $p->status = 1;
                        $p->save();
                    }
                    $pd->end_date = $duration['end_date'];
                    $pd->created_by = auth()->user()->id;
                    $pd->save();
            }

        }
        return redirect()->route('president.president_list')->withStatus(__('President '.$president->member->name.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $p = President::findOrFail($id);
        $pd = PresidentDuration::where('president_id',$p->id)->where('end_date',null)->first();
        if($pd){
            return redirect()->route('president.president_list')->withStatus(__('Can\'t delete'.$p->member->name.' is a running president. First add a new president!'));
        }else{
            $this->soft_delete($p);
            return redirect()->route('president.president_list')->withStatus(__($p->member->name.' status deleted successfully.'));
        }
    }
}
