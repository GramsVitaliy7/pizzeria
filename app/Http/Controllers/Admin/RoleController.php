<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Throwable;

class RoleController extends Controller
{
    /**
     * Display a listing of the role.
     *
     * @return View
     */
    public function index()
    {
        $roles = Role::with('permissions')->get()->sortBy('name');
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return View
     */
    public function create()
    {
        $permissions = Permission::all()->sortBy('name');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param Request $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->fill([
            'name' => $request->input('name'),
        ])->save();
        $permissions = $request->input('permissions');
        foreach ($permissions as $permission) {
            $permission = Permission::find($permission);
            $role->permissions()->attach($permission->id);
        }
        return redirect()->route('admin.roles.index')
            ->with('success', 'Role was added successfully');
    }

    /**
     * Display the specified role.
     *
     * @param Role $role
     * @return View
     */
    public function show(Role $role)
    {
        $permissions = $role->permissions();
        return view('admin.roles.show', compact(['role', 'permissions']));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param Role $role
     * @return View
     */
    public function edit(Role $role)
    {
        $permissions = $role->permissions();
        return view('admin.roles.edit', compact(['role', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return Response
     */
    public function update(Request $request, Role $role)
    {
        $role->fill([
            'name' => $request->input('name')
        ])->save();
        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission was updated successfully');
    }

    /**
     * Remove the specified role from storage.
     *
     * @param Role $role
     * @return Response
     * @throws Throwable
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            $role->permissions()->detach();
            $roles = Role::with('permissions')->get()->sortBy('name');
            $view = view('partials._roles_table', compact('roles'))->render();
            return response()->json(['html' => $view, 'message' => 'Role was deleted']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error! Role was not deleted']);
        }
    }
}
