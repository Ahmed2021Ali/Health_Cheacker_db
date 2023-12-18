<?php

namespace App\Livewire;

use App\Jobs\ActionRunning;
use App\Jobs\ExtendMonth;
use App\Livewire\Forms\SelectForm;
use App\Models\Department;
use App\Models\Input;
use App\Models\Job;
use App\Models\Level;
use App\Models\Operation;
use App\Models\OperationJob;
use App\Models\Panel;
use App\Models\Student;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SelectAction extends Component
{
    public Panel $panel;
    public SelectForm $form;
    public $SelectDepartment;
    public $SelectOperation;
    public array $functions;
    public $data_select;
    public $SelectInputs;

    public function save()
    {
        $this->validate();
        $ticket= Ticket::create([
            'user_id' => auth()->user()->id,
            'panel_id' => $this->panel->id,
            'department_id' => $this->SelectDepartment->id,
            'operation_id' => $this->SelectOperation->id,
        ]);
        $uuid = Str::random(24);
         $this->SelectOperation->job_name::dispatch($this->form->input, $ticket)->onQueue($uuid);
         $job=Job::where('queue',$uuid)->first();
        OperationJob::create([
            'job_id'=>$job->id,
            'queue'=>$job->queue,
            'ticket_id'=>$ticket->id,
        ]);
        return redirect()->route('panels.index');
    }
    #[NoReturn]
    public function mount()
    {
        $this->data_select = [
            'show' => __('Refresh Data..'),
        ];
    }

    public function render()
    {
        return view('livewire.select-action')->layout('dashboard-adminlte.select_action');
    }

    #[Computed()]
    public function GetDepartment()
    {
        return $this->panel->department;
    }

    public function ChangeDepartment(): void
    {
        if ($this->form->department) {
            $this->SelectDepartment = Department::where('value', $this->form->department)->first();
        }
    }

    #[Computed()]
    public function GetOperation()
    {
        return $this->SelectDepartment->operation;
    }

    public function ChangeOperation(): void
    {
        if ($this->form->operation) {
            $this->SelectOperation = Operation::where('value', $this->form->operation)->first();
        }
    }

    public function RunCallBack(string $input_value): void
    {
        setDBConnection($this->panel);
        $inputs = $this->GetInput();
        foreach ($inputs as $input)
        {
            $this->functions[$input->value] =  $input->body ;
        }
        $this->input = Input::where('value', $input_value)->first();
        $function = $this->functions[$input->value];
        $this->SelectInputs =  eval($function);
    }

    #[Computed()]
    public function GetInput()
    {
        return $this->SelectOperation->input;
    }

    #[Computed()]
    public function Connection()
    {
        return setDBConnection($this->panel);
    }
}
