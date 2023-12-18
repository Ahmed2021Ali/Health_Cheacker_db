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

    public function update(UpdatePermissionRequest $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name = $request->validated();
        $permission->save();
        return redirect()->route('permission.index')
            ->with('success','permission updated successfully');
    }

    public function delete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permission.index')->with('success','permission deleted successfully');
    }
}
