<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePanelRequest;
use App\Http\Requests\UpdatePanelRequest;
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
        return view('panel.index',[
            'panels'=>$this->panel->GetAllPanels(),
        ]);
    }

    public function store(StorePanelRequest $request)
    {
         Panel::create([...$request->validated()]);
        return redirect()->back()->with('success','Add Panel Successfully');
    }

    public function update(UpdatePanelRequest $request ,$panel)
    {
       $panel->update([...$request->validated()]);
        return redirect()->back()->with('success','Update Panel Successfully');
    }

    public function delete($panel)
    {
        $panel->delete();
        return redirect()->back()->with('success','Delete Panel Successfully');
    }

    public function show($id)
    {
        $panel= $this->panel->GetPanel($id);
        return view('dashboard-adminlte.select_action',[ 'panel' => $panel]);
    }

}
