<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Models\NationalAward;
use App\Http\Requests\NationalAwardRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NationalAwardController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $n['national_awards'] = NationalAward::where('deleted_at', null)->latest()->get();
        return view('backend.national_award.index',$n);
    }
    public function create(): View
    {
        return view('backend.national_award.create');
    }
    public function store(NationalAwardRequest $request): RedirectResponse
    {
        $nationalAward = new NationalAward;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('nationalAwards', 'public');
            $nationalAward->image = $path;
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $customFileName = $request->title .'.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('nationalAwards', $customFileName,'public');
            $nationalAward->file = $path;
        }

        $nationalAward->title = $request->title;
        $nationalAward->description = $request->description;
        $nationalAward->created_by = auth()->user()->id;
        $nationalAward->save();
        return redirect()->route('national_award.national_award_list')->withStatus(__('National Award '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $n['national_award'] = NationalAward::findOrFail($id);
        return view('backend.national_award.edit', $n);
    }
    public function update(NationalAwardRequest $request, $id): RedirectResponse
    {
        $national_award = NationalAward::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('nationalAwards', 'public');
            $this->fileDelete($national_award->image);
            $national_award->image = $path;
        }
        if ($request->title != $national_award->title || $request->hasFile('file')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $this->fileDelete($national_award->file);
                $customFileName = $request->title .'.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('nationalAwards', $customFileName,'public');
                $national_award->file = $path;
            }else{
                $extension = pathinfo($national_award->file, PATHINFO_EXTENSION);
                $currentFilePath = public_path('storage/'.$national_award->file);
                $newFileName = $request->title.'.'.$extension;
                $newFilePath = Str::replaceLast(basename($currentFilePath), $newFileName, $currentFilePath);
                File::move($currentFilePath, $newFilePath);
                $national_award->file ='nationalAwards/'.$request->title.'.'.$extension;
            }

        }
        $national_award->title = $request->title;
        $national_award->description = $request->description;
        $national_award->updated_by = auth()->user()->id;
        $national_award->save();

        return redirect()->route('national_award.national_award_list')->withStatus(__('National Award '.$national_award->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $national_award = NationalAward::findOrFail($id);
        $this->fileDelete($national_award->image);
        $this->fileDelete($national_award->file);
        $national_award->delete();

        return redirect()->route('national_award.national_award_list')->withStatus(__('National Award '.$national_award->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $national_award = NationalAward::findOrFail($id);
        $this->statusChange($national_award);
        return redirect()->route('national_award.national_award_list')->withStatus(__($national_award->title.' status updated successfully.'));
    }
    public function featured($id): RedirectResponse
    {
        $national_award = NationalAward::findOrFail($id);
        $this->featuredChange($national_award);
        return redirect()->route('national_award.national_award_list')->withStatus(__($national_award->title.' featured updated successfully.'));
    }
}
