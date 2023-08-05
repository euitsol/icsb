<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\President;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class PresidentController extends Controller
{

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(){
        $s['presidents'] = President::with(['durations','member'])->where('deleted_at', null)->latest()->get();
        return view('backend.council_pages.president.index',$s);
    }
    public function create(){
        return view('backend.council_pages.president.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $check = President::where('end_date',null)->first();
        if($check){
            $check->end_date = Carbon::now();
            $check->save();
        }

        $president = new President;
        $president->name = $request->name;
        $president->slug = $request->slug;
        $president->phone = $request->phone;
        $president->email = $request->email;
        $president->designation = $request->designation;
        $president->address = $request->address;
        $president->bio = $request->bio;
        $president->message = $request->message;
        $president->start_date = $request->start_date;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('president', 'public');
            $president->image = $path;
        }
        $president->created_by = auth()->user()->id;
        $president->save();

        return redirect()->route('president.president_list')->withStatus(__('President '.$president->name.' added successfully.'));
    }
}
