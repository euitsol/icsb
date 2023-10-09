<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LatestNewsRequest;
use App\Models\LatestNews;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class LatestNewsController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $s['latest_newses'] = LatestNews::where('deleted_at', null)->orderBy('date','ASC')->get();
        return view('backend.latest_news.index',$s);
    }
    public function create(): View
    {
        return view('backend.latest_news.create');
    }
    public function store(LatestNewsRequest $request): RedirectResponse
    {
        $latest_news = new LatestNews();

        if(!empty($request->images)){
            $images = array();
            foreach($request->images as $image){
                if ($image) {
                    $path = $image->store('latest_newses/images', 'public');
                    array_push($images, $path);
                }
            }
            $latest_news->images= json_encode($images);
        }

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
                        $path = $input_file->storeAs('latest_newses', $customFileName, 'public');

                        $data[$key]['file_path'] = 'latest_newses/' . $customFileName;
                        $data[$key]['file_name'] = $file['file_name'];
                    }
                }
            }
        }
        $latest_news->files = json_encode($data);
        $latest_news->title = $request->title;
        $latest_news->date = $request->date;
        $latest_news->slug = $request->slug;
        $latest_news->description = $request->description;
        $latest_news->created_by = auth()->user()->id;
        $latest_news->save();
        return redirect()->route('latest_news.latest_news_list')->withStatus(__('Latest news '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['latest_news'] = LatestNews::findOrFail($id);
        return view('backend.latest_news.edit', $s);
    }

    public function singleFileDelete($id, $key): RedirectResponse
    {
        $latest_news = LatestNews::findOrFail($id);
        $files = json_decode($latest_news->files, true);
        if (isset($files[$key])) {
            $filePathToDelete = $files[$key]['file_path'];
            unset($files[$key]);
            $latest_news->files = json_encode($files);
            $latest_news->save();
            $this->fileDelete($filePathToDelete);
        }

        return redirect()->back();
    }
    public function update(LatestNewsRequest $request, $id): RedirectResponse
    {
        $latest_news = LatestNews::findOrFail($id);
        if(!empty($request->images)){
            if(!empty($latest_news->images)){
                foreach(json_decode($latest_news->images) as $db_image){
                    $this->fileDelete($db_image);
                }
            }
            $images = array();
            foreach($request->images as $image){
                if ($image) {
                    $path = $image->store('latest_newses/images', 'public');
                    array_push($images, $path);
                }
            }

            $latest_news->images= json_encode($images);
        }

        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        if (!empty($filteredFiles)) {
            foreach ($request->file as $file) {
                $files = json_decode($latest_news->files, true);
                $input_file = $file['file_path'];
                if (!empty($input_file) && !empty($file['file_name'])) {
                    $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                    $path = $input_file->storeAs('latest_newses', $customFileName, 'public');
                    $newFileName = $file['file_name'];
                    $newFilePath = 'latest_newses/'.$customFileName;
                    array_push($files, ["file_path" => $newFilePath, "file_name" => $newFileName]);
                }
                $latest_news->files = json_encode($files);
            }
        }
        if($latest_news->title != $request->title){
            $latest_news->slug = $request->slug;
        }
        $latest_news->date = $request->date;
        $latest_news->title = $request->title;
        $latest_news->description = $request->description;
        $latest_news->updated_by = auth()->user()->id;
        $latest_news->save();
        return redirect()->route('latest_news.latest_news_list')->withStatus(__('Latest news '.$request->title.' created successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $latest_news = LatestNews::findOrFail($id);
        // if(!empty($latest_news->images)){
        //     foreach(json_decode($latest_news->images) as $db_image){
        //         $this->fileDelete($db_image);
        //     }
        // }
        // $files = json_decode($latest_news->files, true);
        // if(!empty($files)){
        //     foreach($files as $key=>$file){
        //         $filePathToDelete = $files[$key]['file_path'];
        //         $this->fileDelete($filePathToDelete);
        //     }
        // }
        // $latest_news->delete();
        $this->soft_delete($latest_news);
        return redirect()->route('latest_news.latest_news_list')->withStatus(__('Latest news '.$latest_news->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $latest_news = LatestNews::findOrFail($id);
        $this->statusChange($latest_news);
        return redirect()->route('latest_news.latest_news_list')->withStatus(__($latest_news->title.' status updated successfully.'));
    }
}
