<?php

namespace App\Http\Controllers;

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
        $panels=$this->panel->GetPanel();
        $departments=$this->dapartment->GetDepartment();
        return view('department.index',compact('departments','panels'));
    }

    public function store(Request $request)
    {
       // dd($request->all());
        Department::create([...$request->except('_token')]);
        return redirect()->back()->with('success','Add Department Successfully');
    }

    public function update(Request $request ,$id)
    {
       // dd($request->all(),$id);
       $department= Department::where('id',$id)->first();
       $department->update([...$request->except('_token','_method')]);
        return redirect()->back()->with('success','Update Department Successfully');
    }

    public function delete($id)
    {
        $department=Department::where('id',$id)->first();
        $department->delete();
        return redirect()->back()->with('success','Delete Department Successfully');
    }

}
