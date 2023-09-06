<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRoomCatRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\MediaRoom;
use App\Http\Requests\MediaRoomRequest;
use App\Models\MediaRoomCategory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MediaRoomController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $s['media_rooms'] = MediaRoom::where('deleted_at', null)->orderBy('program_date','ASC')->get();
        $s['media_room_cats'] = MediaRoomCategory::where('deleted_at', null)->latest()->get();
        return view('backend.media_room.index',$s);
    }
    public function create(): View
    {
        $s['media_room_cats'] = MediaRoomCategory::where('status',1)->where('deleted_at', null)->latest()->get();
        return view('backend.media_room.create',$s);
    }
    public function store(MediaRoomRequest $request): RedirectResponse
    {
        $media_room = new MediaRoom();
        if ($request->hasFile('thumbnail_image')) {

            $thumbnail_image = $request->file('thumbnail_image');
            $path = $thumbnail_image->store('media_rooms/thumbnail_image', 'public');
            $media_room->thumbnail_image = $path;
        }
        if(!empty($request->additional_images)){
            $additional_images = array();
            foreach($request->additional_images as $image){
                if ($image) {
                    $path = $image->store('media_rooms/additional_images', 'public');
                    array_push($additional_images, $path);
                }
            }
            $media_room->additional_images= json_encode($additional_images);
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
                        $path = $input_file->storeAs('media_rooms', $customFileName, 'public');

                        $data[$key]['file_path'] = 'media_rooms/' . $customFileName;
                        $data[$key]['file_name'] = $file['file_name'];
                    }
                }
            }
        }
        $media_room->files = json_encode($data);
        $media_room->title = $request->title;
        $media_room->program_date = $request->program_date;
        $media_room->slug = $request->slug;
        $media_room->category_id = $request->category_id;
        $media_room->description = $request->description;
        $media_room->created_by = auth()->user()->id;
        $media_room->save();
        return redirect()->route('media_room.media_room_list')->withStatus(__('Media room '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['media_room'] = MediaRoom::findOrFail($id);
        $s['media_room_cats'] = MediaRoomCategory::where('status',1)->where('deleted_at', null)->latest()->get();
        return view('backend.media_room.edit', $s);
    }

    public function singleFileDelete($id, $key): RedirectResponse
    {
        $media_room = MediaRoom::findOrFail($id);
        $files = json_decode($media_room->files, true);
        if (isset($files[$key])) {
            $filePathToDelete = $files[$key]['file_path'];
            unset($files[$key]);
            $media_room->files = json_encode($files);
            $media_room->save();
            $this->fileDelete($filePathToDelete);
        }

        return redirect()->back();
    }
    public function update(MediaRoomRequest $request, $id): RedirectResponse
    {
        $media_room = MediaRoom::findOrFail($id);
        if ($request->hasFile('thumbnail_image')) {

            $thumbnail_image = $request->file('thumbnail_image');
            $path = $thumbnail_image->store('media_rooms/thumbnail_image', 'public');
            $this->fileDelete($media_room->thumbnail_image);
            $media_room->thumbnail_image = $path;
        }
        if(!empty($request->additional_images)){
            foreach(json_decode($media_room->additional_images) as $db_image){
                $this->fileDelete($db_image);
            }
            $additional_images = array();
            foreach($request->additional_images as $image){
                if ($image) {
                    $path = $image->store('media_rooms/additional_images', 'public');
                    array_push($images, $path);
                }
            }

            $media_room->additional_images= json_encode($additional_images);
        }

        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        if (!empty($filteredFiles)) {
            foreach ($request->file as $file) {
                $files = json_decode($media_room->files, true);
                $input_file = $file['file_path'];
                if (!empty($input_file) && !empty($file['file_name'])) {
                    $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                    $path = $input_file->storeAs('media_rooms', $customFileName, 'public');
                    $newFileName = $file['file_name'];
                    $newFilePath = 'media_rooms/'.$customFileName;
                    array_push($files, ["file_path" => $newFilePath, "file_name" => $newFileName]);
                }
                $media_room->files = json_encode($files);
            }
        }
        if($media_room->title != $request->title){
            $media_room->slug = $request->slug;
        }
        $media_room->category_id = $request->category_id;
        $media_room->program_date = $request->program_date;
        $media_room->title = $request->title;
        $media_room->description = $request->description;
        $media_room->updated_by = auth()->user()->id;
        $media_room->save();
        return redirect()->route('media_room.media_room_list')->withStatus(__('Media room '.$request->title.' created successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $media_room = MediaRoom::findOrFail($id);
        $this->fileDelete($media_room->thumbnail_image);
        if(!empty($media_room->additional_images)){
            foreach(json_decode($media_room->additional_images) as $db_image){
                $this->fileDelete($db_image);
            }
        }
        $files = json_decode($media_room->files, true);
        if(!empty($files)){
            foreach($files as $key=>$file){
                $filePathToDelete = $files[$key]['file_path'];
                $this->fileDelete($filePathToDelete);
            }
        }
        $media_room->delete();
        return redirect()->route('media_room.media_room_list')->withStatus(__('Media room '.$media_room->title.' deleted successfully.'));
    }
    public function permissionAccept($id): RedirectResponse
    {
        $media_room = MediaRoom::findOrFail($id);
        $this->permissionAcceptFunction($media_room);
        return redirect()->route('media_room.media_room_list')->withStatus(__($media_room->title.' accept successfully.'));
    }
    public function permissionDecline($id): RedirectResponse
    {
        $media_room = MediaRoom::findOrFail($id);
        $this->permissionDeclineFunction($media_room);
        return redirect()->route('media_room.media_room_list')->withStatus(__($media_room->title.' decline successfully.'));
    }
    public function featured($id): RedirectResponse
    {
        $media_room = MediaRoom::findOrFail($id);
        $this->featuredChange($media_room);
        if($media_room->is_featured == 1)
        {
            return redirect()->back()->withStatus(__($media_room->title.' added on featured successfully.'));
        }else{
            return redirect()->back()->withStatus(__($media_room->title.' remove from featured successfully.'));
        }
    }

    // Media Room Category
    public function cat_create():View
    {
        return view('backend.media_room.cat_create');
    }

    public function cat_store(MediaRoomCatRequest $request): RedirectResponse
    {

        $cat = new MediaRoomCategory;
        $cat->name = $request->name;
        $cat->slug = $request->slug;
        $cat->created_by = auth()->user()->id;
        $cat->save();

        return redirect()->route('media_room.media_room_list')->withStatus(__('Media Room Category '.$cat->name.' created successfully.'));
    }

    public function cat_edit($id):View
    {
        $s['cat'] = MediaRoomCategory::findOrFail($id);
        return view('backend.media_room.cat_edit',$s);
    }

    public function cat_update(MediaRoomCatRequest $request, $id): RedirectResponse
    {
        $cat = MediaRoomCategory::findOrFail($id);
        $cat->name = $request->name;
        $cat->slug = $request->slug;
        $cat->updated_by = auth()->user()->id;
        $cat->save();

        return redirect()->route('media_room.media_room_list')->withStatus(__('Media room Category '.$cat->name.' updated successfully.'));
    }

    public function cat_status($id): RedirectResponse
    {
        $cat = MediaRoomCategory::findOrFail($id);
        $this->statusChange($cat);
        return redirect()->route('media_room.media_room_list')->withStatus(__($cat->name.' status updated successfully.'));
    }

    public function cat_delete($id): RedirectResponse
    {
        $cat = MediaRoomCategory::findOrFail($id);
        if($cat->media_rooms->count() > 0){
            return redirect()->route('media_room.media_room_list')->withStatus(__($cat->name.' has '.$cat->media_rooms->count().' media_rooms assigned. Can\'t be deleted. Best option is to deactivate it.'));
        }
        $this->soft_delete($cat);
        return redirect()->route('media_room.media_room_list')->withStatus(__('Category '.$cat->name.' deleted successfully.'));
    }

}
