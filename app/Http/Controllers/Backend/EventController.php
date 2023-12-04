<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Models\Member;
use Illuminate\View\View;
use App\Http\Requests\EventRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Traits\SendMailTrait;



class EventController extends Controller
{
    //
    use SendMailTrait;

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $n['events']= Event::where('deleted_at', null)->latest()->get();
        return view('backend.event.index',$n);
    }
    public function create(): View
    {
        return view('backend.event.create');
    }
    public function store(EventRequest $request): RedirectResponse
    {
        $event = new Event();
        if(!empty($request->image)){
            $images = array();
            foreach($request->image as $image){
                if ($image) {
                    $path = $image->store('events', 'public');
                    array_push($images, $path);
                }
            }
            $event->image= json_encode($images);
        }
        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->total_participant = $request->total_participant;
        $event->event_location = $request->event_location;
        $event->video_url = $request->video_url;
        $event->event_start_time = $request->event_start_time;
        $event->event_end_time = $request->event_end_time;
        $event->description = $request->description;
        $event->type = $request->type;

        if($request->notify == 1){
            $event->notify = $request->notify;
            $event->email_subject = $request->email_subject;
            $event->email_body = $request->email_body;
        }

        $event->created_by = auth()->user()->id;
        $event->save();


        if($request->notify == 1){
            $this->send_member_email($event);
        }


        return redirect()->route('event.event_list')->withStatus(__('Event '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $n['event'] = Event::findOrFail($id);
        return view('backend.event.edit', $n);
    }
    public function update(EventRequest $request, $id): RedirectResponse
    {
        $event = Event::findOrFail($id);

        if(!empty($request->image)){
            foreach(json_decode($event->image) as $db_image){
                $this->fileDelete($db_image);
            }
            $images = array();
            foreach($request->image as $image){
                if ($image) {
                    $path = $image->store('events', 'public');
                    array_push($images, $path);
                }
            }

            $event->image= json_encode($images);
        }
        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->total_participant = $request->total_participant;
        $event->event_location = $request->event_location;
        $event->video_url = $request->video_url;
        $event->event_start_time = $request->event_start_time;
        $event->event_end_time = $request->event_end_time;
        $event->description = $request->description;
        $event->type = $request->type;

        if($request->notify == 1){
            $event->notify = $request->notify;
            $event->email_subject = $request->email_subject;
            $event->email_body = $request->email_body;
        }
        $event->updated_by = auth()->user()->id;
        $event->save();

        return redirect()->route('event.event_list')->withStatus(__('Event '.$event->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        // foreach(json_decode($event->image) as $db_image){
        //     $this->fileDelete($db_image);
        // }
        // $event->delete();
        $this->soft_delete($event);

        return redirect()->route('event.event_list')->withStatus(__('Event '.$event->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        $this->statusChange($event);
        return redirect()->route('event.event_list')->withStatus(__($event->title.' status updated successfully.'));
    }
    public function featured($id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        $this->featuredChange($event);
        return redirect()->route('event.event_list')->withStatus(__($event->title.' featured updated successfully.'));
    }
}
