<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
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
        return view('operation.index',[
            'departments'=>$this->dapartment->GetAllDepartments(),
            'operations'=>$this->operation->GetAllOperations()
        ]);
    }

    public function store(StoreOperationRequest $request)
    {
       Operation::create([...$request->validated()]);
        return redirect()->back()->with('success','Add Operation Successfully');
    }

    public function update(UpdateOperationRequest $request ,$id)
    {
        $operation = $this->dapartment->GetDepartment($id);
        $operation->update([...$request->validated()]);
        return redirect()->back()->with('success','Update Operation Successfully');
    }

    public function delete($id)
    {
        $operation = $this->dapartment->GetDepartment($id);
        $operation->delete();
        return redirect()->back()->with('success','Delete Operation Successfully');
    }
}
