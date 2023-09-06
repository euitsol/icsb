<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PresidentRequest;
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
        $check1= PresidentDuration::where('deleted_at',null)->where('end_date','<=',Carbon::now()->format('Y-m-d'))->first();
        if($check1){
                $p = President::findOrFail($check1->president->id);
                $p->status = 0;
                $p->designation = 'Past President, ICSB';
                $p->save();
        }
        $check2= PresidentDuration::where('deleted_at',null)->where('end_date','>',Carbon::now()->format('Y-m-d'))->first();
        if($check2){
            $p = President::findOrFail($check2->president->id);
            $p->status = 1;
            $p->designation = 'President, ICSB';
            $p->save();
        }
        $check3= PresidentDuration::where('deleted_at',null)->where('end_date',null)->first();
        if($check3){
            $p = President::findOrFail($check3->president->id);
            $p->status = 1;
            $p->designation = 'President, ICSB';
            $p->save();
        }

        $s['presidents'] = President::with(['durations','member'])->where('deleted_at', null)->orderBy('order_key','DESC')->get();
        return view('backend.council_pages.president.index',$s);
    }
    public function create(): View
    {
        $s['members'] = Member::where('status',1)->where('deleted_at', null)->latest()->get();
        return view('backend.council_pages.president.create',$s);
    }
    public function store(PresidentRequest $request): RedirectResponse
    {
        foreach ($request->duration as $key => $duration) {
            if(empty($duration['end_date']) || (!empty($duration['end_date']) && $duration['end_date'] > Carbon::now()->format('Y-m-d'))){
                $check = PresidentDuration::where('deleted_at',null)->where('end_date',null)->first();
                $check2 = PresidentDuration::where('deleted_at',null)->where('end_date','>',Carbon::now()->format('Y-m-d'))->first();
                if($check2){
                    return redirect()->route('president.president_list')->withStatus(__('President '.$check2->president->member->name.' end date not expire! Fist change ' .$check2->president->member->name.' end date or you can add past president with end date!'));
                }
                if($check){
                    $check->end_date = Carbon::now()->format('Y-m-d');
                    $check->save();
                    $p = President::findOrFail($check->president->id);
                    $p->status = 0;
                    $p->designation = 'Past President, ICSB';
                    $p->save();
            }

        }
        }
        $president = new President;
        $president->order_key = $request->order_key;
        $president->member_id = $request->member_id;
        $president->slug = $request->slug.'-'.$request->member_id;
        // $president->designation = $request->designation;
        $president->bio = $request->bio;
        $president->message = $request->message;
        $president->created_by = auth()->user()->id;
        $president->save();

        foreach ($request->duration as $key => $duration) {
            $pd= new PresidentDuration();
            $pd->president_id = $president->id;
            $pd->start_date = $duration['start_date'];
            if((!empty($duration['end_date']) && $duration['end_date'] <= Carbon::now()->format('Y-m-d'))){
                $p = President::findOrFail($president->id);
                $p->status = 0;
                $p->designation = 'Past President, ICSB';
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
    public function update(PresidentRequest $request, $id): RedirectResponse
    {
        if(!empty($request->duration)){
            foreach ($request->duration as $key => $duration) {
                    if(empty($duration['end_date']) || (!empty($duration['end_date']) && $duration['end_date'] > Carbon::now()->format('Y-m-d'))){
                            $check = PresidentDuration::where('deleted_at',null)->where('end_date',null)->where('president_id','!=',$id)->first();
                            $check2 = PresidentDuration::where('deleted_at',null)->where('end_date','>',Carbon::now()->format('Y-m-d'))->where('president_id','!=',$id)->first();
                            if($check2){
                                return redirect()->route('president.president_list')->withStatus(__('President '.$check2->president->member->name.' end date not expire! Fist change ' .$check2->president->member->name.' end date or you can add past president with end date!'));
                            }
                            if($check){
                                $check->end_date = Carbon::now()->format('Y-m-d');
                                $check->save();
                                $p = President::findOrFail($check->president->id);
                                $p->status = 0;
                                $p->designation = 'Past President, ICSB';
                                $p->save();
                            }

                    }
        }

        }
        $president = President::findOrFail($id);
        $president->order_key = $request->order_key;
        $president->member_id = $request->member_id;
        if($president->slug != $request->slug){
            $president->slug = $request->slug.'-'.$request->member_id;
        }
        $president->bio = $request->bio;
        // $president->designation = $request->designation;
        $president->message = $request->message;
        $president->created_by = auth()->user()->id;
        $president->update();


        if(!empty($request->duration)){
            foreach ($request->duration as $key => $duration) {
                if((!empty($duration['end_date']) && $duration['end_date'] <= Carbon::now()->format('Y-m-d') &&  !empty($duration['start_date']))){
                    $check= PresidentDuration::where('deleted_at',null)->where('president_id',$id)->where('id',$duration['id'])->first();
                    if($check){
                        $check->start_date = $duration['start_date'];
                        $check->end_date = $duration['end_date'];
                        $check->save();
                        $p = President::findOrFail($id);
                        $p->status = 0;
                        $p->designation = 'Past President, ICSB';
                        $p->save();
                    }
                }elseif((isset($duration['start_date']) && !empty($duration['start_date'])) ){
                        $pd= new PresidentDuration();
                        $pd->president_id = $id;
                        $pd->start_date = $duration['start_date'];
                        $pd->end_date = $duration['end_date'];
                        $pd->created_by = auth()->user()->id;
                        $pd->save();
                        $p = President::findOrFail($id);
                        if((empty($duration['end_date'])) || (!empty($duration['end_date']) && $duration['end_date'] > Carbon::now()->format('Y-m-d'))){
                            $p->status = 1;
                            $p->designation = 'President, ICSB';
                        }else{
                            $p->status = 0;
                            $p->designation = 'Past President, ICSB';
                        }
                        $p->save();
                }

            }
        }

        return redirect()->route('president.president_list')->withStatus(__('President '.$president->member->name.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $p = President::findOrFail($id);
        $pd = PresidentDuration::where('deleted_at',null)->where('president_id',$p->id)->where('end_date',null)->first();
        if($pd){
            return redirect()->route('president.president_list')->withStatus(__('Can\'t delete'.$p->member->name.' is a running president. First add a new president!'));
        }else{
            $this->soft_delete($p);
            return redirect()->route('president.president_list')->withStatus(__($p->member->name.' status deleted successfully.'));
        }
    }
    public function singleDelete($id): RedirectResponse
    {
        $scd = PresidentDuration::findOrFail($id);
        $scd->delete();
        return redirect()->back();
    }
}
