<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SecretarialStandardRequest;
use App\Models\SecretarialStandard;
use Illuminate\Http\UploadedFile;

class SecretarialStandardsController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['bsss'] = SecretarialStandard::with('created_user')->where('deleted_at', null)->latest()->get();
        return view('backend.rules_pages.bss.index',$s);
    }
    public function create(): View
    {
        return view('backend.rules_pages.bss.create');
    }
    public function store(SecretarialStandardRequest $request): RedirectResponse
    {
        $bss = new SecretarialStandard;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('bss', 'public');
            $bss->image = $path;
        }
        $fileName = $request->file['file_name'];
        $file = $request->file['file_path'];
        $data = array();
        if (!empty($fileName) && !empty($file)) {
                $customFileName = $fileName . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('bss', $customFileName, 'public');

                $data['file_path'] = 'bss/' . $customFileName;
                $data['file_name'] = $fileName;
        }
        $bss->file = json_encode($data);
        $bss->title = $request->title;
        $bss->slug = $request->slug;
        $bss->short_title = $request->short_title;
        $bss->description = $request->description;
        $bss->created_by = auth()->user()->id;
        $bss->save();
        return redirect()->route('bss.bss_list')->withStatus(__('BSS '.$bss->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['bss'] = SecretarialStandard::findOrFail($id);
        return view('backend.rules_pages.bss.edit', $s);
    }
    public function update(SecretarialStandardRequest $request, $id): RedirectResponse
    {
        $bss = SecretarialStandard::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('bss', 'public');
            $this->fileDelete($bss->image);
            $bss->image = $path;
        }
        $data = array();
        if (!empty($request->file['file_name']) && !empty($request->file['file_path'])) {
                $fileName = $request->file['file_name'];
                $file = $request->file['file_path'];
                $oldfile = json_decode($bss->file, true);
                $filePathToDelete = $oldfile['file_path'];
                $this->fileDelete($filePathToDelete);
                $customFileName = $fileName . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('bss', $customFileName, 'public');
                $data['file_path'] = 'bss/' . $customFileName;
                $data['file_name'] = $fileName;
                $bss->file = json_encode($data);
        }
        $bss->title = $request->title;
        $bss->slug = $request->slug;
        $bss->short_title = $request->short_title;
        $bss->description = $request->description;
        $bss->updated_by = auth()->user()->id;
        $bss->save();
        return redirect()->route('bss.bss_list')->withStatus(__('BSS '.$bss->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $bss = SecretarialStandard::findOrFail($id);
        $this->soft_delete($bss);
        return redirect()->route('bss.bss_list')->withStatus(__('BSS '.$bss->title.' status deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $bss = SecretarialStandard::findOrFail($id);
        $this->statusChange($bss);
        return redirect()->route('bss.bss_list')->withStatus(__($bss->title.' status updated successfully.'));
    }
    public function featured($id): RedirectResponse
    {
        $bss = SecretarialStandard::findOrFail($id);
        $this->featuredChange($bss);
        return redirect()->route('bss.bss_list')->withStatus(__($bss->title.' featured updated successfully.'));
    }

}
