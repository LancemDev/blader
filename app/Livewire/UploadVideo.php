<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UploadVideoForm;
use Mary\Traits\Toast;

class UploadVideo extends Component
{
    use Toast;
    use WithFileUploads;
    public UploadVideoForm $form;
    public function submitForm()
    {
        $this->form->submit();
        $this->success('Video Uploaded, check it out');
    
    }
    public function mount()
    {
        // $this->form = new UploadVideoForm(w,r);
    }
    // public function save2()
    // {

    //     // Toast
    //     $this->success('Video Uploaded, check it out');
    // }
    public function render()
    {
        return view('livewire.upload-video');
    }
}