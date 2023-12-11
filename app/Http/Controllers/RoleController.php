<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /*   function __construct()
        {
            $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
            $this->middleware('permission:role-create', ['only' => ['create','store']]);
            $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
            $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        }*/

    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        if(isset($request->permissions))
        {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'nullable',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('role.index')
            ->with('success', 'Role updated successfully');
    }

    public function delete($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }


}
