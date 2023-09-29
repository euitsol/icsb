<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SecAndCeoRequest;
use App\Models\Member;
use Carbon\Carbon;
use App\Models\SecAndCeoDuration;
use App\Models\SecAndCeo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class SecAndCeoController extends Controller
{

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $check1= SecAndCeoDuration::where('deleted_at',null)->where('end_date','<=',Carbon::now()->format('Y-m-d'))->first();
        if($check1){
                $sc = SecAndCeo::findOrFail($check1->secretary_and_ceo->id);
                $sc->status = 0;
                $sc->designation = 'Past Secretary & CEO, ICSB';
                $sc->save();
        }
        $check2= SecAndCeoDuration::where('deleted_at',null)->where('end_date','>',Carbon::now()->format('Y-m-d'))->first();
        if($check2){
            $sc = SecAndCeo::findOrFail($check2->secretary_and_ceo->id);
            $sc->status = 1;
            $sc->designation = 'Secretary & CEO, ICSB';
            $sc->save();
        }
        $check3= SecAndCeoDuration::where('deleted_at',null)->where('end_date',null)->first();
        if($check3){
            $sc = SecAndCeo::findOrFail($check3->secretary_and_ceo->id);
            $sc->status = 1;
            $sc->designation = 'Secretary & CEO, ICSB';
            $sc->save();
        }

        $s['sec_and_ceos'] = SecAndCeo::with(['durations','member'])->where('deleted_at', null)->latest()->get();
        return view('backend.employee_pages.secretary_and_ceo.index',$s);
    }
    public function create(): View
    {
        $s['members'] = Member::where('status',1)->where('deleted_at', null)->where('member_type',1)->latest()->get();
        return view('backend.employee_pages.secretary_and_ceo.create',$s);
    }
    public function store(SecAndCeoRequest $request): RedirectResponse
    {
        foreach ($request->duration as $key => $duration) {
            if(empty($duration['end_date']) || (!empty($duration['end_date']) && $duration['end_date'] > Carbon::now()->format('Y-m-d'))){
                $check = SecAndCeoDuration::where('deleted_at',null)->where('end_date',null)->first();
                $check2 = SecAndCeoDuration::where('deleted_at',null)->where('end_date','>',Carbon::now()->format('Y-m-d'))->first();
                if($check2){
                    return redirect()->route('sec_and_ceo.sc_list')->withStatus(__('Secretary & CEO '.$check2->secretary_and_ceo->member->name.'\'s end date is not expired. Fist update his end date.'));
                }
                if($check){
                    $check->end_date = Carbon::now()->format('Y-m-d');
                    $check->save();
                    $sc = SecAndCeo::findOrFail($check->secretary_and_ceo->id);
                    $sc->status = 0;
                    $sc->designation = 'Past Secretary & CEO, ICSB';
                    $sc->save();
            }

        }
        }
        $secretary_and_ceo = new SecAndCeo();
        $secretary_and_ceo->member_id = $request->member_id;
        $secretary_and_ceo->slug = $request->slug.'-'.$request->member_id;
        // $secretary_and_ceo->designation = $request->designation;
        $secretary_and_ceo->bio = $request->bio;
        $secretary_and_ceo->message = $request->message;
        $secretary_and_ceo->created_by = auth()->user()->id;
        $secretary_and_ceo->save();

        foreach ($request->duration as $key => $duration) {
            $scd= new SecAndCeoDuration();
            $scd->sc_id = $secretary_and_ceo->id;
            $scd->start_date = $duration['start_date'];
            if((!empty($duration['end_date']) && $duration['end_date'] <= Carbon::now()->format('Y-m-d'))){
                $sc = SecAndCeo::findOrFail($secretary_and_ceo->id);
                $sc->status = 0;
                $sc->designation = 'Past Secretary & CEO, ICSB';
                $sc->save();
            }
            $scd->end_date = $duration['end_date'];
            $scd->created_by = auth()->user()->id;
            $scd->save();
        }
        return redirect()->route('sec_and_ceo.sc_list')->withStatus(__('Secretary & CEO '.$secretary_and_ceo->member->name.' added successfully.'));
    }
    public function edit($id):View
    {
        $s['members'] = Member::where('status',1)->where('member_type',1)->where('deleted_at', null)->latest()->get();
        $s['sec_and_ceo'] = SecAndCeo::with(['durations','member'])->findOrFail($id);

        return view('backend.employee_pages.secretary_and_ceo.edit',$s);
    }
    public function update(SecAndCeoRequest $request, $id): RedirectResponse
    {
        if(!empty($request->duration)){
            SecAndCeoDuration::where('sc_id',$id)->delete();
            foreach ($request->duration as $key => $duration) {
                if(empty($duration['end_date']) || (!empty($duration['end_date']) && $duration['end_date'] > Carbon::now()->format('Y-m-d'))){
                    $check = SecAndCeoDuration::where('deleted_at',null)->where('end_date',null)->first();
                    $check2 = SecAndCeoDuration::where('deleted_at',null)->where('end_date','>',Carbon::now()->format('Y-m-d'))->first();
                    if($check2){
                        return redirect()->route('sec_and_ceo.sc_list')->withStatus(__('Secretary & CEO '.$check2->secretary_and_ceo->member->name.'\'s end date is not expired. Fist update his end date.'));
                    }
                    if($check){
                        $check->end_date = Carbon::now()->format('Y-m-d');
                        $check->save();
                        $sc = SecAndCeo::findOrFail($check->secretary_and_ceo->id);
                        $sc->status = 0;
                        $sc->designation = 'Past Secretary & CEO, ICSB';
                        $sc->save();
                }

                }
            }

            $secretary_and_ceo = SecAndCeo::findOrFail($id);
            $secretary_and_ceo->member_id = $request->member_id;
            if($secretary_and_ceo->slug != $request->slug){
                $secretary_and_ceo->slug = $request->slug.'-'.$request->member_id;
            }
            $secretary_and_ceo->bio = $request->bio;
            // $secretary_and_ceo->designation = $request->designation;
            $secretary_and_ceo->message = $request->message;
            $secretary_and_ceo->created_by = auth()->user()->id;
            $secretary_and_ceo->update();



            foreach ($request->duration as $key => $duration) {
                $scd= new SecAndCeoDuration();
                $scd->sc_id = $secretary_and_ceo->id;
                $scd->start_date = $duration['start_date'];
                if((!empty($duration['end_date']) && $duration['end_date'] <= Carbon::now()->format('Y-m-d'))){
                    $sc = SecAndCeo::findOrFail($secretary_and_ceo->id);
                    $sc->status = 0;
                    $sc->designation = 'Past Secretary & CEO, ICSB';
                    $sc->save();
                }
                $scd->end_date = $duration['end_date'];
                $scd->created_by = auth()->user()->id;
                $scd->save();
            }
        }
        return redirect()->route('sec_and_ceo.sc_list')->withStatus(__('Secretary & CEO '.$secretary_and_ceo->member->name.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $sc = SecAndCeo::findOrFail($id);
        $scd = SecAndCeoDuration::where('deleted_at',null)->where('sc_id',$sc->id)->where('end_date',null)->first();
        if($scd){
            return redirect()->route('sec_and_ceo.sc_list')->withStatus(__('Can\'t delete'.$sc->member->name.' is a running cecretary & CEO. First add a new secretary & CEO!'));
        }else{
            $this->soft_delete($sc);
            return redirect()->route('sec_and_ceo.sc_list')->withStatus(__($sc->member->name.' status deleted successfully.'));
        }
    }
    public function singleDelete($id): RedirectResponse
    {
        $scd = SecAndCeoDuration::findOrFail($id);
        $scd->delete();
        return redirect()->back();
    }
}
