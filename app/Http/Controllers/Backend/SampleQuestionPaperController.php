<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SampleQuestionPaperRequest;
use App\Models\SampleQuestionPaper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class SampleQuestionPaperController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['sample_question_papers'] = SampleQuestionPaper::where('deleted_at',null)->orderBy('order_key','ASC')->get();
        return view('backend.examination.sample_question_paper.index',$s);
    }
    public function create(): View
    {
        return view('backend.examination.sample_question_paper.create');
    }
    public function store(SampleQuestionPaperRequest $request): RedirectResponse
    {
        $sqp = new SampleQuestionPaper();
        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        $data = array();
        if ($filteredFiles) {
            foreach ($request->file as $key => $file) {
                if (isset($file['file_name']) && isset($file['file_path'])) {
                    $input_file = $file['file_path'];
                    if (!empty($input_file)) {
                        $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                        $input_file->storeAs('sample_question_papers', $customFileName, 'public');

                        $data[$key]['file_path'] = 'sample_question_papers/' . $customFileName;
                        $data[$key]['file_name'] = $file['file_name'];
                    }
                }
            }
        }
        $sqp->files = json_encode($data);
        $sqp->title = $request->title;
        $sqp->slug = $request->slug;
        $sqp->order_key = $request->order_key;
        $sqp->created_by = auth()->user()->id;
        $sqp->save();
        return redirect()->route('sample_question_paper.sqp_list')->withStatus(__('Sample question paper '.$sqp->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['sqp'] = SampleQuestionPaper::findOrFail($id);
        return view('backend.examination.sample_question_paper.edit', $s);
    }
    public function singleFileDelete($id, $key): RedirectResponse
    {
        $sqp = SampleQuestionPaper::findOrFail($id);
        $files = json_decode($sqp->files, true);
        if (isset($files[$key])) {
            $filePathToDelete = $files[$key]['file_path'];
            unset($files[$key]);
            $sqp->files = json_encode($files);
            $sqp->save();
            $this->fileDelete($filePathToDelete);
        }
        return redirect()->back();
    }
    public function update(SampleQuestionPaperRequest $request, $id): RedirectResponse
    {
        $sqp = SampleQuestionPaper::findOrFail($id);
        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        if (!empty($filteredFiles)) {
            foreach ($request->file as $file) {
                $files = json_decode($sqp->files, true);
                $input_file = $file['file_path'];
                if (!empty($input_file) && !empty($file['file_name'])) {
                    $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                    $input_file->storeAs('sample_question_papers', $customFileName, 'public');
                    $newFileName = $file['file_name'];
                    $newFilePath = 'sample_question_papers/'.$customFileName;
                    array_push($files, ["file_path" => $newFilePath, "file_name" => $newFileName]);
                }
                $sqp->files = json_encode($files);
            }
        }
        $sqp->slug = $request->slug;
        $sqp->order_key = $request->order_key;
        $sqp->title = $request->title;
        $sqp->updated_by = auth()->user()->id;
        $sqp->save();
        return redirect()->route('sample_question_paper.sqp_list')->withStatus(__('Sample question paper '.$sqp->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        // $sqp = SampleQuestionPaper::findOrFail($id);
        // $files = json_decode($sqp->files, true);
        // if(!empty($files)){
        //     foreach($files as $key=>$file){
        //         $filePathToDelete = $files[$key]['file_path'];
        //         $this->fileDelete($filePathToDelete);
        //     }
        // }
        // $sqp->delete();

        $sqp = SampleQuestionPaper::findOrFail($id);
        $this->soft_delete($sqp);
        return redirect()->route('sample_question_paper.sqp_list')->withStatus(__('Sample question paper '.$sqp->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $sqp = SampleQuestionPaper::findOrFail($id);
        $this->statusChange($sqp);
        return redirect()->route('sample_question_paper.sqp_list')->withStatus(__($sqp->title.' status updated successfully.'));
    }
}
