<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['role_name'])->get();
        return view('admin.roles.index',compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3']
        ]);

        Role::create($validated);

        return to_route('dashboard.roles.index')->with('message', 'Role Created Sucessfully!');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3']
        ]);

        $role->update($validated);
        return to_route('dashboard.roles.index')->with('message', 'Role Updated Sucessfully!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message', 'Role Deleted Sucessfully!');
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission))
        {
            return back()->with('message', 'Permission Already Exists!');
        }

        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission Added!');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission))
        {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission Revoke');
        }

        return back()->with('message', 'Permission Not Exists!');
    }
}
