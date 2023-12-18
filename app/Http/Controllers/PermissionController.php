<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('permissions.index',compact('permissions'));
    }
    public function store(StorePermissionRequest $request)
    {
        Permission::create([...$request->validated()]);
        return redirect()->route('permission.index')->with('success','permission created successfully');
    }

    public function update(UpdatePermissionRequest $request,Permission $permission)
    {
        $permission->update([$request->validated()]);
        return redirect()->route('permission.index')
            ->with('success','permission updated successfully');
    }

    public function delete(Permission$permission)
    {
        $permission->delete();
        return redirect()->route('permission.index')->with('success','permission deleted successfully');
    }
}
