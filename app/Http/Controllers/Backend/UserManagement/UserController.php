<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $users = User::where('deleted_at', null)->with('role')->latest()->get();
        return view('backend.user-management.user.index', ['users' =>$users]);
    }
    public function create(): View
    {
        $s['roles'] = Role::where('deleted_at',null)->latest()->get();
        return view('backend.user-management.user.create',$s);
    }
    public function store(UserRequest $request): RedirectResponse
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = Hash::make($request->password);
        $user->created_by = auth()->user()->id;
        $user->save();

        $user->assignRole($user->role->name);

        return redirect()->route('um.user.user_list')->withStatus(__('User '.$user->name.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['roles'] = Role::where('deleted_at',null)->latest()->get();
        $s['user'] = User::findOrFail($id);
        return view('backend.user-management.user.edit',$s);
    }
    public function update(UserRequest $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        if(!empty($user->password)){
            $user->password = Hash::make($request->password);
        }
        $user->updated_by = auth()->user()->id;
        $user->save();

        $user->assignRole($user->role->name);

        return redirect()->route('um.user.user_list')->withStatus(__('User '.$user->name.' updated successfully.'));
    }

    public function status($id): RedirectResponse
    {
        $user = user::findOrFail($id);
        $this->statusChange($user);
        return redirect()->route('um.user.user_list')->withStatus(__($user->name.' status updated successfully.'));
    }

    public function delete($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $this->soft_delete($user);

        return redirect()->route('um.user.user_list')->withStatus(__('User '.$user->name.' deleted successfully.'));
    }
}
