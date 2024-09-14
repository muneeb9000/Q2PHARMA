<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\companies;
use App\Models\Module;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = companies::all();
        $roles = Role::with('company')->get();
        return view('roles.list', compact('roles','companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $companies = companies::all();
       $roles = Role::all();
       return view('roles.list', compact('roles','companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
            'company_id' => 'required|exists:companies,id',
        ]);
        $roles = Role::create($validatedData);
        return redirect()->route('roles.index')->with('Success','Role Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $modules = Module::all();
        $permissions = Permission::all();
        $roles = Role::findOrFail($id);
        return view('roles.permissions', compact('roles', 'permissions','modules'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = companies::all();
        $roles = Role::findOrFail($id);
        return view('roles.edit', compact('roles','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
        ]);

        $roles = Role::findOrFail($id);
        $roles->update($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = Role::findOrFail($id);
        $roles->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }

    public function updatePermissions(Request $request, Role $role)
    {
       
        $permissions = $request->input('permissions', []); 
        foreach ($permissions as $permissionId => $status) {
            $permission = Permission::find($permissionId);

            if ($status == 'allow') {
                if (!$role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                }
            } else {
                if ($role->hasPermissionTo($permission)) {
                    $role->revokePermissionTo($permission);
                }
            }
        }
        return redirect()->route('roles.index')->with('success', 'Permissions updated successfully.');
    }

}
