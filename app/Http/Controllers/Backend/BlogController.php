<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $n['blogs'] = Blog::where('deleted_at', null)->latest()->get();
        return view('backend.blog.index',$n);
    }
    public function create(): View
    {
        return view('backend.blog.create');
    }
    public function store(BlogRequest $request): RedirectResponse
    {
        $blog = new Blog();
        if ($request->hasFile('thumbnail_image')) {

            $thumbnail_image = $request->file('thumbnail_image');
            $path = $thumbnail_image->store('blogs/thumbnail_image', 'public');
            $blog->thumbnail_image = $path;
        }
        if(!empty($request->additional_images)){
            $additional_images = array();
            foreach($request->additional_images as $image){
                if ($image) {
                    $path = $image->store('blogs/additional_images', 'public');
                    array_push($additional_images, $path);
                }
            }
            $blog->additional_images= json_encode($additional_images);
        }

        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        $data = array();
        if ($filteredFiles == true) {
            foreach ($request->file as $key => $file) {
                if (isset($file['file_name']) && isset($file['file_path'])) {
                    $input_file = $file['file_path'];
                    if (!empty($input_file)) {
                        $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                        $path = $input_file->storeAs('blogs', $customFileName, 'public');

                        $data[$key]['file_path'] = 'blogs/' . $customFileName;
                        $data[$key]['file_name'] = $file['file_name'];
                    }
                }
            }
        }
        $blog->files = json_encode($data);
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->created_by = auth()->user()->id;
        $blog->save();
        return redirect()->route('blog.blog_list')->withStatus(__('Blog '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $n['blog'] = Blog::findOrFail($id);
        return view('backend.blog.edit', $n);
    }

    public function singleFileDelete($id, $key): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        $files = json_decode($blog->files, true);
        if (isset($files[$key])) {
            $filePathToDelete = $files[$key]['file_path'];
            unset($files[$key]);
            $blog->files = json_encode($files);
            $blog->save();
            $this->fileDelete($filePathToDelete);
        }

        return redirect()->back();
    }
    public function update(BlogRequest $request, $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        if ($request->hasFile('thumbnail_image')) {

            $thumbnail_image = $request->file('thumbnail_image');
            $path = $thumbnail_image->store('blogs/thumbnail_image', 'public');
            $this->fileDelete($blog->thumbnail_image);
            $blog->thumbnail_image = $path;
        }
        if(!empty($request->additional_images)){
            foreach(json_decode($blog->additional_images) as $db_image){
                $this->fileDelete($db_image);
            }
            $additional_images = array();
            foreach($request->additional_images as $image){
                if ($image) {
                    $path = $image->store('blogs/additional_images', 'public');
                    array_push($images, $path);
                }
            }

            $blog->additional_images= json_encode($additional_images);
        }

        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        if (!empty($filteredFiles)) {
            foreach ($request->file as $file) {
                $files = json_decode($blog->files, true);
                $input_file = $file['file_path'];
                if (!empty($input_file) && !empty($file['file_name'])) {
                    $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                    $path = $input_file->storeAs('blogs', $customFileName, 'public');
                    $newFileName = $file['file_name'];
                    $newFilePath = 'blogs/'.$customFileName;
                    array_push($files, ["file_path" => $newFilePath, "file_name" => $newFileName]);
                }
                $blog->files = json_encode($files);
            }
        }
        if($blog->title != $request->title){
            $blog->slug = $request->slug;
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->updated_by = auth()->user()->id;
        $blog->save();
        return redirect()->route('blog.blog_list')->withStatus(__('Blog '.$request->title.' created successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        $this->fileDelete($blog->thumbnail_image);
        if(!empty($blog->additional_images)){
            foreach(json_decode($blog->additional_images) as $db_image){
                $this->fileDelete($db_image);
            }
        }
        $files = json_decode($blog->files, true);
        if(!empty($files)){
            foreach($files as $key=>$file){
                $filePathToDelete = $files[$key]['file_path'];
                $this->fileDelete($filePathToDelete);
            }
        }
        $blog->delete();
        return redirect()->route('blog.blog_list')->withStatus(__('blog '.$blog->title.' deleted successfully.'));
    }
    public function permissionAccept($id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        $this->permissionAcceptFunction($blog);
        return redirect()->route('blog.blog_list')->withStatus(__($blog->title.' accept successfully.'));
    }
    public function permissionDecline($id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        $this->permissionDeclineFunction($blog);
        return redirect()->route('blog.blog_list')->withStatus(__($blog->title.' decline successfully.'));
    }
    public function featured($id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        $this->featuredChange($blog);
        if($blog->is_featured == 1)
        {
            return redirect()->back()->withStatus(__($blog->title.' added on featured successfully.'));
        }else{
            return redirect()->back()->withStatus(__($blog->title.' remove from featured successfully.'));
        }
    }
}
