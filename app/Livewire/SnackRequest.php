<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SnackRequest as SnackRequestModel;
use App\Livewire\Forms\SnackRequestForm;

class SnackRequest extends Component
{
    
    public SnackRequestForm $form;

    public function save()
    {
        $this->validate();
        $this->form->submit();
    }
    public function render()
    {
        return view('livewire.snack-request');
    }
}
