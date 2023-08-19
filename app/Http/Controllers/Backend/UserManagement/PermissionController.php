<?php

namespace App\Http\Controllers\Backend\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $permissions = Permission::orderBy('prefix')->get();
        return view('backend.user-management.permission.index', ['permissions' =>$permissions]);
    }

    public function create(): View
    {
        return view('backend.user-management.permission.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->prefix = $request->prefix;
        $permission->save();

        return redirect()->route('um.permission.permission_list')->withStatus(__('New permission created successfully.'));
    }
}
