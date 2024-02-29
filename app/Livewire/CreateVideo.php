<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    use WithFileUploads;
    public Video $video;
    public $videoFile;

    public function mount()
    {
        $this->video = new Video();
    }

    public function fileCompleted()
    {
        $this->video->file_path = $this->videoFile->store('videos', 'public');
    }
    public function upload()
    {
        $this->validate([
            'videoFile' => 'required|file|mimes:mp4|max:102400',
        ]);

    }
    public function render()
    {
        return view('livewire.create-video');
    }
}
