<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SelectForm extends Form
{
    #[Rule('required')]
    public $department = '';

    #[Rule('required')]
    public $operation = '';

    #[Rule('required')]
    public array $input = array();






}
