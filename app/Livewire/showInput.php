<?php

namespace App\Livewire;

use App\Livewire\Forms\InputForm;
use Livewire\Attributes\Computed;
use Livewire\Component;

class showInput extends Component
{
    public $inputs;

    public function remove($id)
    {
        \App\Models\Input::where('id', $id)->delete();
        return redirect()->route('input.show');
    }

    public function mount()
    {
        $input = new \App\Models\Input();
        $this->inputs = $input->GetInput();
    }

    public function render()
    {
        return view('livewire.show-input')->layout('dashboard-adminlte.show_input');
    }

}
