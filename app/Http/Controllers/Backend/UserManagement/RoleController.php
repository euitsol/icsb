<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    //

    public function __construct() {

    }

    public function index(): View
    {
        $roles = Role::where('deleted_at', null)->with('permissions')->latest()->get();

        foreach ($roles as $role) {
            $permissionNames = $role->permissions->pluck('name')->implode(' | ');
            $role->permissionNames = $permissionNames;
        }
        return view('backend.user-management.role.index', ['roles' =>$roles]);
    }

    public function create(): View
    {

        $permissions = Permission::orderBy('name')->get();
        $groupedPermissions = $permissions->groupBy(function ($permission) {
            return explode('_', $permission->name)[0]; // Assuming your permissions have prefixes separated by a space
        });
        return view('backend.user-management.role.create', ['groupedPermissions' => $groupedPermissions]);
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        $role = new Role;
        $role->name = $request->name;
        $role->note = $request->note;
        $role->created_by = auth()->user()->id;
        $role->save();

        $role->givePermissionTo($request->permissions);

        return redirect()->route('um.role.role_list')->withStatus(__('New role created successfully.'));
    }

    public function edit($id): View
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::orderBy('name')->get();
        $groupedPermissions = $permissions->groupBy(function ($permission) {
            return explode('_', $permission->name)[0]; // Assuming your permissions have prefixes separated by a space
        });
        return view('backend.user-management.role.edit', ['role' => $role, 'groupedPermissions' => $groupedPermissions]);
    }

    public function update(RoleRequest $request, $id): RedirectResponse
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->note = $request->note;
        $role->updated_by = auth()->user()->id;
        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('um.role.role_list')->withStatus(__('Role '.$role->name.' updated successfully.'));
    }

    public function delete($id): RedirectResponse
    {
        $role = Role::findOrFail($id);
        // $role->delete();
        $this->soft_delete($role);

        return redirect()->route('um.role.role_list')->withStatus(__('Role '.$role->name.' deleted successfully.'));
    }
}
