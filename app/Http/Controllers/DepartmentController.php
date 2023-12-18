<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\Panel;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public $panel;
    public $dapartment;
    public function __construct()
    {
        $this->panel=new Panel();
        $this->dapartment=new Department();
        $this->middleware('permission:department.store', ['only' => ['store']]);
        $this->middleware('permission:department.update', ['only' => ['update']]);
        $this->middleware('permission:department.delete', ['only' => ['delete']]);

    }

    public function index()
    {
        return view('department.index',[
            'departments' => $this->dapartment->GetAllDepartments(),
            'panels' => $this->panel->GetAllPanels()
        ]);
    }

    public function store(StoreDepartmentRequest $request)
    {
        Department::create([...$request->validated()]);
        return redirect()->back()->with('success','Add Department Successfully');
    }

    public function update(UpdateDepartmentRequest $request ,Department $department)
    {
       $department->update([...$request->validated()]);
        return redirect()->back()->with('success','Update Department Successfully');
    }

    public function delete(Department $department)
    {
        $department->delete();
        return redirect()->back()->with('success','Delete Department Successfully');
    }

}
