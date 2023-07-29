<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Models\IcsbProfile;
use App\Http\Requests\IcsbProfileRequest;
use Illuminate\Http\RedirectResponse;

class ICSBProfileController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $s['icsb_profile'] = IcsbProfile::where('deleted_at', null)->first();
        return view('backend.ICSB_profile.create',$s);
    }
    public function store(IcsbProfileRequest $request): RedirectResponse
    {
        $profile = IcsbProfile::where('deleted_at', null)->first();
        if ($profile === null) {
            $profile = new IcsbProfile();
            $profile->title = $request->title;
            $profile->description = $request->description;
            $profile->created_by = auth()->user()->id;
            $profile->save();
        }
        $profile->title = $request->title;
        $profile->description = $request->description;
        $profile->updated_by = auth()->user()->id;
        $profile->update();
        return redirect()->route('icsb_profile.icsb_profile_create')->withStatus(__('ICSB profile updated successfully.'));
    }
}
