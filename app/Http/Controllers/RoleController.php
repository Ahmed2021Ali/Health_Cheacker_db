<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('roles.index', compact('roles', 'permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create([ $request->validated()]);
        if (isset($request->permissions)) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update([$request->validated()]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('role.index')
            ->with('success', 'Role updated successfully');
    }

    public function delete(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }


}
