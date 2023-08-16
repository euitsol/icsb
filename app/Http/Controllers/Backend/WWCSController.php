<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorldWideCSRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Models\WWCS;
use Illuminate\Http\RedirectResponse;

class WWCSController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $n['wwcss']= WWCS::where('deleted_at', null)->latest()->get();
        return view('backend.world_wide_cs.index',$n);
    }
    public function create(): View
    {
        return view('backend.world_wide_cs.create');
    }
    public function store(WorldWideCSRequest $request): RedirectResponse
    {
        $wwcs = new WWCS;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('world_wide_cs', 'public');
            $wwcs->logo = $path;
        }

        $wwcs->title = $request->title;
        $wwcs->url = $request->url;
        $wwcs->description = $request->description;
        $wwcs->created_by = auth()->user()->id;
        $wwcs->save();
        return redirect()->route('wwcs.wwcs_list')->withStatus(__('World Wide CS '.stringLimit(html_entity_decode_table($wwcs->title)).' created successfully.'));
    }
    public function edit($id): View
    {
        $n['wwcs'] = WWCS::findOrFail($id);
        return view('backend.world_wide_cs.edit', $n);
    }
    public function update(WorldWideCSRequest $request, $id): RedirectResponse
    {
        $wwcs = wwcs::findOrFail($id);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('world_wide_cs', 'public');
            $this->fileDelete($wwcs->logo);
            $wwcs->logo = $path;
        }

        $wwcs->title = $request->title;
        $wwcs->url = $request->url;
        $wwcs->description = $request->description;
        $wwcs->updated_by = auth()->user()->id;
        $wwcs->save();

        return redirect()->route('wwcs.wwcs_list')->withStatus(__('World Wide CS '.stringLimit(html_entity_decode_table($wwcs->title)).' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $wwcs = WWCS::findOrFail($id);
        $this->fileDelete($wwcs->logo);
        $wwcs->delete();

        return redirect()->route('wwcs.wwcs_list')->withStatus(__('World Wide CS '.stringLimit(html_entity_decode_table($wwcs->title)).' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $wwcs = WWCS::findOrFail($id);
        $this->statusChange($wwcs);
        return redirect()->route('wwcs.wwcs_list')->withStatus(__(stringLimit(html_entity_decode_table($wwcs->title)).' status updated successfully.'));
    }
}
