<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Act;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Http\Requests\ActsRequest;

class ActsController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['acts'] = Act::where('deleted_at',null)->orderBy('order_key','ASC')->get();
        return view('backend.rules_pages.acts.index',$s);
    }
    public function create(): View
    {
        return view('backend.rules_pages.acts.create');
    }
    public function store(ActsRequest $request): RedirectResponse
    {
        $act = new Act();
        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        $data = array();
        if ($filteredFiles) {
            foreach ($request->files as $key => $file) {
                if (isset($file['file_name']) && isset($file['file_path'])) {
                    $input_file = $file['file_path'];
                    if (!empty($input_file)) {
                        $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                        $input_file->storeAs('acts', $customFileName, 'public');

                        $data[$key]['file_path'] = 'acts/' . $customFileName;
                        $data[$key]['file_name'] = $file['file_name'];
                    }
                }
            }
        }
        $act->files = json_encode($data);
        $act->title = $request->title;
        $act->slug = $request->slug;
        $act->order_key = $request->order_key;
        $act->created_by = auth()->user()->id;
        $act->save();
        return redirect()->route('acts.acts_list')->withStatus(__('Act '.$act->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['act'] = Act::findOrFail($id);
        return view('backend.rules_pages.acts.edit', $s);
    }
    public function singleFileDelete($id, $key): RedirectResponse
    {
        $act = Act::findOrFail($id);
        $files = json_decode($act->files, true);
        if (isset($files[$key])) {
            $filePathToDelete = $files[$key]['file_path'];
            unset($files[$key]);
            $act->files = json_encode($files);
            $act->save();
            $this->fileDelete($filePathToDelete);
        }
        return redirect()->back();
    }
    public function update(ActsRequest $request, $id): RedirectResponse
    {
        $act = Act::findOrFail($id);
        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        if (!empty($filteredFiles)) {
            foreach ($request->file as $file) {
                $files = json_decode($act->files, true);
                $input_file = $file['file_path'];
                if (!empty($input_file) && !empty($file['file_name'])) {
                    $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                    $input_file->storeAs('acts', $customFileName, 'public');
                    $newFileName = $file['file_name'];
                    $newFilePath = 'acts/'.$customFileName;
                    array_push($files, ["file_path" => $newFilePath, "file_name" => $newFileName]);
                }
                $act->files = json_encode($files);
            }
        }
        $act->slug = $request->slug;
        $act->order_key = $request->order_key;
        $act->title = $request->title;
        $act->updated_by = auth()->user()->id;
        $act->save();
        return redirect()->route('acts.acts_list')->withStatus(__('Act '.$act->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $act = Act::findOrFail($id);
        $files = json_decode($act->files, true);
        if(!empty($files)){
            foreach($files as $key=>$file){
                $filePathToDelete = $files[$key]['file_path'];
                $this->fileDelete($filePathToDelete);
            }
        }
        $act->delete();

        // $act = Act::findOrFail($id);
        // $this->soft_delete($act);
        return redirect()->route('acts.acts_list')->withStatus(__('Act '.$act->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $act = Act::findOrFail($id);
        $this->statusChange($act);
        return redirect()->route('acts.acts_list')->withStatus(__($act->title.' status updated successfully.'));
    }
}
