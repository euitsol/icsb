<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RecentVideo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class RecentVideoController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $s['recent_videos'] = RecentVideo::where('deleted_at',null)->latest()->get();
        return view('backend.recent_video.index',$s);
    }
    public function create(): View
    {
        return view('backend.recent_video.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $recent_video = new RecentVideo();
        $recent_video->title = $request->title;
        $recent_video->url = $request->url;
        $recent_video->created_by = auth()->user()->id;
        $recent_video->save();
        return redirect()->route('recent_video.recent_video_list')->withStatus(__('Recent Video '.$recent_video->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['recent_video'] = RecentVideo::findOrFail($id);
        return view('backend.recent_video.edit',$s);
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $recent_video = RecentVideo::findOrFail($id);
        $recent_video->title = $request->title;
        $recent_video->url = $request->url;
        $recent_video->updated_by = auth()->user()->id;
        $recent_video->save();
        return redirect()->route('recent_video.recent_video_list')->withStatus(__('Recent Video '.$recent_video->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $recent_video = RecentVideo::findOrFail($id);
        $this->fileDelete($recent_video->logo);
        $recent_video->delete();

        return redirect()->route('recent_video.recent_video_list')->withStatus(__('Recent Video '.$recent_video->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $recent_video = RecentVideo::findOrFail($id);
        $this->statusChange($recent_video);
        return redirect()->route('recent_video.recent_video_list')->withStatus(__($recent_video->title.' status updated successfully.'));
    }
}
