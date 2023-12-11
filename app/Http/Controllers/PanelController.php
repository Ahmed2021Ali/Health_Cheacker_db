<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class PanelController extends Controller
{
    public $panel;

    public function __construct()
    {
        $this->panel=new Panel();
        $this->middleware('permission:panel.store', ['only' => ['store']]);
        $this->middleware('permission:panel.update', ['only' => ['update']]);
        $this->middleware('permission:panel.delete', ['only' => ['delete']]);
        $this->middleware('permission:panel.show', ['only' => ['show']]);
    }


    public function index()
    {
        $panels=$this->panel->GetPanel();
        return view('panel.index',compact('panels'));
    }

    public function store(Request $request)
    {
         Panel::create([...$request->except('_token')]);
        return redirect()->back()->with('success','Add Panel Successfully');
    }

    public function update(Request $request ,$id)
    {
       $panel= Panel::where('id',$id)->first();
       $panel->update([...$request->except('_token','_method')]);
        return redirect()->back()->with('success','Update Panel Successfully');
    }

    public function delete($id)
    {
       $panel=Panel::where('id',$id)->first();
        return redirect()->back()->with('success','Delete Panel Successfully');
    }

    public function show($id)
    {
        $panel= Panel::where('id',$id)->first();
        return view('dashboard-adminlte.select_action',[ 'panel' => $panel]);
    }

}
