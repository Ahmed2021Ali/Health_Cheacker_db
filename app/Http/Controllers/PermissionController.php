<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('permissions.index',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);
        Permission::create(['name' => $request->input('name')]);
        return redirect()->route('permission.index')->with('success','permission created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
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
