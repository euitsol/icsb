<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConvocationRequest;
use App\Models\Convocation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ConvocationController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $n['convocations'] = Convocation::where('deleted_at', null)->latest()->get();
        return view('backend.publication_pages.convocation.index',$n);
    }
    public function create(): View
    {
        return view('backend.publication_pages.convocation.create');
    }
    public function store(ConvocationRequest $request): RedirectResponse
    {
        $convocation = new Convocation;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('convocations', 'public');
            $convocation->image = $path;
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $customFileName = $request->title .'.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('convocations', $customFileName,'public');
            $convocation->file = $path;
        }

        $convocation->title = $request->title;
        $convocation->description = $request->description;
        $convocation->created_by = auth()->user()->id;
        $convocation->save();
        return redirect()->route('convocation.convocation_list')->withStatus(__('Convocation '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $n['convocation'] = Convocation::findOrFail($id);
        return view('backend.publication_pages.convocation.edit', $n);
    }
    public function update(ConvocationRequest $request, $id): RedirectResponse
    {
        $convocation = Convocation::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('convocations', 'public');
            $this->fileDelete($convocation->image);
            $convocation->image = $path;
        }
        if ($request->title != $convocation->title || $request->hasFile('file')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $this->fileDelete($convocation->file);
                $customFileName = $request->title .'.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('convocations', $customFileName,'public');
                $convocation->file = $path;
            }else{
                $extension = pathinfo($convocation->file, PATHINFO_EXTENSION);
                $currentFilePath = public_path('storage/'.$convocation->file);
                $newFileName = $request->title.'.'.$extension;
                $newFilePath = Str::replaceLast(basename($currentFilePath), $newFileName, $currentFilePath);
                File::move($currentFilePath, $newFilePath);
                $convocation->file ='convocations/'.$request->title.'.'.$extension;
            }

        }
        $convocation->title = $request->title;
        $convocation->description = $request->description;
        $convocation->updated_by = auth()->user()->id;
        $convocation->save();

        return redirect()->route('convocation.convocation_list')->withStatus(__('Convocation '.$convocation->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $convocation = Convocation::findOrFail($id);
        $this->fileDelete($convocation->image);
        $this->fileDelete($convocation->file);
        $convocation->delete();

        return redirect()->route('convocation.convocation_list')->withStatus(__('Convocation '.$convocation->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $convocation = Convocation::findOrFail($id);
        $this->statusChange($convocation);
        return redirect()->route('convocation.convocation_list')->withStatus(__($convocation->title.' status updated successfully.'));
    }
}

