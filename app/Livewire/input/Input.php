<?php

namespace App\Livewire\Input;

use App\Livewire\Forms\InputForm;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Input extends Component
{
    public $inputs;
    public $showTable=true;
    public InputForm $form;


    public function save()
    {
        $this->validate();
        \App\Models\Input::create([
            'operation_id' => $this->form->operation_id,
            'label' => $this->form->lebal,
            'type' => $this->form->type,
            'event' => $this->form->event,
            'value' => $this->form->value,
            'callback'=>$this->form->callback??null,
            'body' => $this->form->body??null,
        ]);
        $this->showTable=true;
    }
    #[Computed()]
    public function GetAllOperations()
    {
        $operation = new \App\Models\Operation();
        return $operation->GetAllOperations();
    }

    public function mount()
    {
        $input = new \App\Models\Input();
        $this->inputs = $input->GetAllInputs();
    }

    public function remove($id)
    {
        \App\Models\Input::where('id', $id)->delete();
        return redirect()->route('input.show');
    }
    public function showTableMethod()
    {
        $this->showTable=false;
    }

    public function render()
    {
        return view('livewire.input.input')->layout('dashboard-adminlte.show_input');
    }
}
