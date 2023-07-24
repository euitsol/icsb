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
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('nationalConnections', 'public');
            $nationalConnection->logo = $path;
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

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('nationalConnections', 'public');
            $this->fileDelete($nationalConnection->logo);
            $nationalConnection->logo = $path;
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
        $this->fileDelete($nationalConnection->logo);
        $nationalConnection->delete();

        return redirect()->route('national_connection.national_connection_list')->withStatus(__('National Connection '.$nationalConnection->title.' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $nationalConnection = NationalConnection::findOrFail($id);
        $this->statusChange($nationalConnection);
        return redirect()->route('national_connection.national_connection_list')->withStatus(__($nationalConnection->title.' status updated successfully.'));
    }
}
