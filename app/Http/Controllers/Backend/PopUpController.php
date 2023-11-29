<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PopUp;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PopUpRequest;
use Illuminate\View\View;

class PopUpController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['pop_ups']= PopUp::where('deleted_at', null)->orderBy('order_key','ASC')->get();
        return view('backend.pop_up.index',$s);
    }
    public function create(): View
    {
        return view('backend.pop_up.create');
    }
    public function store(PopUpRequest $request): RedirectResponse
    {
        $popUp = new PopUp;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('popUps', 'public');
            $popUp->image = $path;
        }

        $popUp->order_key = $request->order_key;
        $popUp->url = $request->url;
        $popUp->created_by = auth()->user()->id;
        $popUp->save();
        return redirect()->route('pop_up.pop_up_list')->withStatus(__('Pop Up added successfully.'));
    }
    public function edit($id): View
    {
        $s['pop_up'] = PopUp::findOrFail($id);
        return view('backend.pop_up.edit', $s);
    }
    public function update(PopUpRequest $request, $id): RedirectResponse
    {
        $popUp = PopUp::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('popUps', 'public');
            $this->fileDelete($popUp->image);
            $popUp->image = $path;
        }

        $popUp->order_key = $request->order_key;
        $popUp->url = $request->url;
        $popUp->updated_by = auth()->user()->id;
        $popUp->save();

        return redirect()->route('pop_up.pop_up_list')->withStatus(__('Pop Up updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $popUp = PopUp::findOrFail($id);
        $this->soft_delete($popUp);

        return redirect()->route('pop_up.pop_up_list')->withStatus(__('Pop Up deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $popUp = PopUp::findOrFail($id);
        $this->statusChange($popUp);
        return redirect()->route('pop_up.pop_up_list')->withStatus(__('Pop Up status updated successfully.'));
    }
}
