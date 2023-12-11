<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OperationController extends Controller
{
    public $dapartment;
    public $operation;

    public function __construct()
    {
        $this->dapartment=new Department();
        $this->operation=new Operation();
        $this->middleware('permission:operation.store', ['only' => ['store']]);
        $this->middleware('permission:operation.update', ['only' => ['update']]);
        $this->middleware('permission:operation.delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $departments=$this->dapartment->GetDepartment();
        $operations=$this->operation->GetOperation();
        return view('operation.index',compact('operations','departments'));
    }

    public function store(Request $request)
    {
       Operation::create([...$request->except('_token')]);
        return redirect()->back()->with('success','Add Operation Successfully');
    }

    public function update(Request $request ,$id)
    {
        $operation = Operation::where('id',$id)->first();
        $operation->update([...$request->except('_token','_method')]);
        return redirect()->back()->with('success','Update Operation Successfully');
    }

    public function delete($id)
    {
        $operation= Operation::where('id',$id)->first();
        $operation->delete();
        return redirect()->back()->with('success','Delete Operation Successfully');
    }
}
