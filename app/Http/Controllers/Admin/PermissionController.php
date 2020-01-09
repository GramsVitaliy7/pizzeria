<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Throwable;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     *
     * @return View
     */
    public function index()
    {
        $permissions = Permission::all()->sortBy('name');
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created permission in storage.
     *
     * @param Request $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->fill($request->all())->save();
        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission was added successfully');
    }

    /**
     * Display the specified permission.
     *
     * @param Permission $permission
     * @return View
     */
    public function show(Permission $permission)
    {
        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return View
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified permission in storage.
     *
     * @param Request $request
     * @param Permission $permission
     * @return Redirect
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->fill($request->all())->save();
        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission was updated successfully');
    }

    /**
     * Remove the specified permission from storage.
     *
     * @param Permission $permission
     * @return Response
     * @throws Throwable
     */
    public function destroy(Permission $permission)
    {
        try {
            $permission->delete();
            $permissions = Permission::all()->sortBy('name');
            $view = view('partials.admin._permissions_table', compact('permissions'))->render();
            return response()->json(['html' => $view, 'message' => 'Permission was deleted']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Permission was not deleted']);
        }
    }
}
