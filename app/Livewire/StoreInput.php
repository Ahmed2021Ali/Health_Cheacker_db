<?php

namespace App\Livewire;

use App\Livewire\Forms\InputForm;
use Livewire\Attributes\Computed;
use Livewire\Component;

class StoreInput extends Component
{
    public InputForm $form;
    public $inputs;


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
        return redirect()->route('input.show');
    }

    #[Computed()]
    public function GetOperation()
    {
        $operation = new \App\Models\Operation();
        return $operation->GetOperation();
    }


    public function render()
    {
        return view('livewire.store-input')->layout('dashboard-adminlte.store_input');
    }
}
