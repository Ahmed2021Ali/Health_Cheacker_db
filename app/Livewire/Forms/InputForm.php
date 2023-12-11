<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class InputForm extends Form
{
    #[Validate('required')]
    public $operation_id = '';

    #[Validate('required')]
    public $lebal = '';

    #[Validate('required','unique')]
    public $value = '';

    #[Validate('required')]
    public $type = '';

}
