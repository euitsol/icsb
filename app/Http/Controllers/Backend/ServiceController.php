<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;
use Psr\Log\NullLogger;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $n['services'] = Service::with('created_user')->where('deleted_at', null)->latest()->get();
        return view('backend.service.index',$n);
    }
    public function create(): View
    {
        return view('backend.service.create');
    }
    public function store(ServiceRequest $request): RedirectResponse
    {
        $service = new Service;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('services', 'public');
            $service->image = $path;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->created_by = auth()->user()->id;
        $service->save();
        return redirect()->route('service.service_list')->withStatus(__('Service '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $n['service'] = Service::findOrFail($id);
        return view('backend.service.edit', $n);
    }
    public function update(ServiceRequest $request, $id): RedirectResponse
    {
        $service = Service::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('services', 'public');
            $this->fileDelete($service->image);
            $service->image = $path;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->updated_by = auth()->user()->id;
        $service->save();

        return redirect()->route('service.service_list')->withStatus(__('Service '.$service->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $service = Service::findOrFail($id);
        $this->fileDelete($service->image);
        $service->delete();

        return redirect()->route('service.service_list')->withStatus(__('Faq '.$service->title.' deleted successfully.'));
    }
}
