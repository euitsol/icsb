<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(){
        $n['services'] = Service::with('created_user')->latest()->get();
        return view('backend.service.index',$n);
    }
    public function create(){
        return view('backend.service.create');
    }
    public function store(ServiceRequest $request){
        $service = new Service;


        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/service'), $imageName);
            $service->image = '/uploaded/service/' . $imageName;
        }
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();
        return redirect()->route('service.service_list');
    }
    public function edit($id){
        $n['service'] = Service::findOrFail($id);
        return view('backend.service.edit', $n);
    }
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $image_path = public_path($service->image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/service'), $imageName);
            $service->image = '/uploaded/service/' . $imageName;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->updated_by = auth()->user()->id;
        $service->save();

        return redirect()->route('service.service_list')->withStatus(__('Service '.$service->title.' updated successfully.'));
    }
    public function delete($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.service_list')->withStatus(__('Faq '.$service->title.' deleted successfully.'));
    }
}
