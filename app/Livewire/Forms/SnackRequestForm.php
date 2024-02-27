<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\SnackRequest as SnackRequestModel;

class SnackRequestForm extends Form
{
    #[Rule('required|in:sweet,salty,hot,cold,disgusting')]
    public $type = '';

    #[Rule('required|in:asap,morning,afternoon,evening')]
    public $time = '';

    public function submit()
    {
        SnackRequestModel::create($this->toArray());
    }
}
