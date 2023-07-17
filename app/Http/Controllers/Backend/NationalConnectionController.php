<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Models\NationalConnection;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\NationalConnectionRequest;
class NationalConnectionController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $n['national_connections']= NationalConnection::where('deleted_at', null)->latest()->get();
        return view('backend.national_connection.index',$n);
    }
    public function create(): View
    {
        return view('backend.national_connection.create');
    }
    public function store(NationalConnectionRequest $request): RedirectResponse
    {
        $nationalConnection = new NationalConnection;
        $logo = $request->file('logo');
        if ($logo) {
            $logoName = time() . '_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploaded/National_Connection'), $logoName);
            $nationalConnection->logo = '/uploaded/National_Connection/' . $logoName;
        }
        $nationalConnection->title = $request->title;
        $nationalConnection->url = $request->url;
        $nationalConnection->created_by = auth()->user()->id;
        $nationalConnection->save();
        return redirect()->route('national_connection.national_connection_list')->withStatus(__('National Connection '.$request->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $n['connection'] = NationalConnection::findOrFail($id);
        return view('backend.national_connection.edit', $n);
    }
    public function update(NationalConnectionRequest $request, $id): RedirectResponse
    {
        $nationalConnection = NationalConnection::findOrFail($id);

        $logo = $request->file('logo');
        if ($logo) {
            $logo_path = public_path($nationalConnection->logo);
            @unlink($logo_path);
            $logoName = time() . '_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploaded/nationalConnection'), $logoName);
            $nationalConnection->logo = '/uploaded/nationalConnection/' . $logoName;
        }

        $nationalConnection->title = $request->title;
        $nationalConnection->url = $request->url;
        $nationalConnection->updated_by = auth()->user()->id;
        $nationalConnection->save();

        return redirect()->route('national_connection.national_connection_list')->withStatus(__('National Connection '.$nationalConnection->title.' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $nationalConnection = NationalConnection::findOrFail($id);
        $nationalConnection->delete();

        return redirect()->route('national_connection.national_connection_list')->withStatus(__('National Connection '.$nationalConnection->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $nationalConnection = NationalConnection::findOrFail($id);
        if($nationalConnection->status == 1){
            $nationalConnection->status = 0;
        }else{
            $nationalConnection->status = 1;
        }
        $nationalConnection->save();
        $nationalConnection->updated_by = auth()->user()->id;
        $nationalConnection->save();

        return redirect()->route('national_connection.national_connection_list')->withStatus(__($nationalConnection->title.' status updated successfully.'));
    }
}
