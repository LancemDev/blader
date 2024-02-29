<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Livewire\Forms\UploadVideoForm as Form;
// use Mary\Traits\Toast;

class UploadVideo extends Component
{
    use WithFileUploads;

    public Form $form;

    public function submitForm()
    {
        $this->validate();
        $this->form->submit();
    }

    public function render()
    {
        return view('livewire.upload-video');
    }
}