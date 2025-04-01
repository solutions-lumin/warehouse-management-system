<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

// class RoleController extends Controller
// {
//     public function index()
//     {
//         $roles = Role::with('permissions')->get();
//         return view('admin.roles.index', compact('roles'));
//     }

//     public function create()
//     {
//         $permissions = Permission::all();
//         return view('admin.roles.create', compact('permissions'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|unique:roles,name',
//             'permissions' => 'array'
//         ]);

//         $role = Role::create(['name' => $request->name]);
//         $role->permissions()->attach($request->permissions);

//         return redirect()->route('roles.index')->with('success', 'Role created successfully.');
//     }

//     public function edit(Role $role)
//     {
//         $permissions = Permission::all();
//         return view('admin.roles.edit', compact('role', 'permissions'));
//     }

//     public function update(Request $request, Role $role)
//     {
//         $request->validate([
//             'name' => 'required|unique:roles,name,' . $role->id,
//             'permissions' => 'array'
//         ]);

//         $role->update(['name' => $request->name]);
//         $role->permissions()->sync($request->permissions);

//         return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
//     }

//     public function destroy(Role $role)
//     {
//         $role->delete();
//         return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
//     }
// }

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:roles',
    //         'permissions' => 'array',
    //     ]);

    //     $role = Role::create(['name' => $request->name]);
    //     $role->permissions()->sync($request->permissions);

    //     return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    // public function update(Request $request, Role $role)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:roles,name,' . $role->id,
    //         'permissions' => 'array',
    //     ]);

    //     $role->update(['name' => $request->name]);
    //     $role->permissions()->sync($request->permissions);

    //     return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    // }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array',
        ]);

        $role->update(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}