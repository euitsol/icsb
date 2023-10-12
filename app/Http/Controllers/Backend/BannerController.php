<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Banner;
use App\Models\BannerImage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerImageRequest;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $s['banners']= Banner::where('deleted_at', null)->latest()->get();
        return view('backend.banner.index',$s);
    }
    public function create(): View
    {
        return view('backend.banner.create');
    }
    public function store(BannerRequest $request): RedirectResponse
    {
        $banner = new Banner();

        $banner->banner_name = $request->banner_name;
        $banner->from_time = $request->from_time;
        $banner->to_time = $request->to_time;
        $banner->created_by = auth()->user()->id;
        $banner->save();
        return redirect()->route('banner.image.banner_create',['banner_id'=>$banner->id]);
    }
    public function createImage($banner_id): View
    {
        $s['banner'] = Banner::findOrFail($banner_id);
        return view('backend.banner.image_upload',$s);
    }
    public function storeImage(BannerImageRequest $request, $banner_id): RedirectResponse
    {
        if(!empty($request->images) && $request->hasFile('images')){
            foreach($request->images as $image){
                    $bannerImage = new BannerImage();
                    $bannerImage->banner_id = $banner_id;
                    $path = $image->store('banner/'.$banner_id, 'public');
                    $bannerImage->image = $path;
                    $bannerImage->created_by = auth()->user()->id;
                    $bannerImage->save();
            }
        }
        Banner::where('status', 1)
                ->where('id', '<>', $banner_id)
                ->update(['status' => 0]);
        return redirect()->route('banner.banner_list')->withStatus(__('Banner '.$bannerImage->banner->banner_name.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['banner'] = Banner::findOrFail($id);
        return view('backend.banner.edit', $s);
    }
    public function update(BannerRequest $request, $id): RedirectResponse
    {
        $banner = Banner::findOrFail($id);

        $banner->banner_name = $request->banner_name;
        $banner->from_time = $request->from_time;
        $banner->to_time = $request->to_time;
        $banner->updated_by = auth()->user()->id;
        $banner->save();
        return redirect()->route('banner.banner_list')->withStatus(__('Banner '.$request->banner_name.' updated successfully.'));
    }
    public function editImage($banner_id): View
    {
        $s['banner'] = Banner::findOrFail($banner_id);
        return view('backend.banner.image_edit',$s);
    }

    public function updateImage(BannerImageRequest $request, $banner_id): RedirectResponse
    {
        if(!empty($request->images) && $request->hasFile('images')){
            foreach($request->images as $image){
                    $bannerImage = new BannerImage();
                    $bannerImage->banner_id = $banner_id;
                    $path = $image->store('banner/'.$banner_id, 'public');
                    $bannerImage->image = $path;
                    $bannerImage->created_by = auth()->user()->id;
                    $bannerImage->save();
            }
        }
        return redirect()->back()->withStatus(__('New Image created successfully.'));
    }
    public function deleteImage($id){
        $banner_image = BannerImage::findOrFail($id);
        $this->fileDelete($banner_image->image);
        $banner_image->delete();

        return redirect()->back()->withStatus(__('Image deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $banner = Banner::findOrFail($id);
        $this->statusChange($banner);
        if ($banner->status == 1) {
            Banner::where('status', 1)
                ->where('id', '<>', $id)
                ->update(['status' => 0]);
        }
        return redirect()->route('banner.banner_list')->withStatus(__($banner->banner_name.' status updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $banner = Banner::with('images')->findOrFail($id);
        // foreach($banner->images as $image){
        //     $this->fileDelete($image->image);
        //     Storage::deleteDirectory('public/banner/'.$banner->id);
        // }
        // $banner->delete();
        $this->soft_delete($banner);
        return redirect()->route('banner.banner_list')->withStatus(__('Banner '.$banner->banner_name.' deleted successfully.'));
    }

}
