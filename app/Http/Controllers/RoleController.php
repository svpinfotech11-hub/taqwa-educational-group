<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role Created Successfully');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $id
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('roles.index')->with('success', 'Role Updated Successfully');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->users()->count() > 0) {
            return back()->with(
                'success',
                'This role is assigned to users, cannot delete'
            );
        }

        $role->delete();

        return back()->with('success', 'Role Deleted Successfully');
    }
}
