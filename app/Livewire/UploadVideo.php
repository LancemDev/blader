<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadVideo extends Component
{
    use WithFileUploads;
    public $file;

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|max:10240',
        ]);
    }

    public function render()
    {
        return view('livewire.upload-video');
    }
}
