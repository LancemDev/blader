<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Livewire\Forms\UploadVideoForm as Form;

class UploadVideo extends Component
{
    use WithFileUploads;

    public Form $form;

    public function save()
    {
        $this->validate();
        // get the original file path
        $this->form->original_file_path = $this->form->video->store('videos', 'public');
        // get the thumbnail path
        $this->form->thumbnail_path = $this->form->thumbnail->store('thumbnails', 'public');
        $this->form->submit();
    }

    public function render()
    {
        return view('livewire.upload-video');
    }
}