<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UploadVideoForm;

class UploadVideo extends Component
{
    use WithFileUploads;
    public UploadVideoForm $form;
    public function submitForm()
    {
        $this->form->submit();
    
    }
    public function mount()
    {
        // $this->form = new UploadVideoForm(w,r);
    }
    public function render()
    {
        return view('livewire.upload-video');
    }
}