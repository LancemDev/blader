<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;

class UploadVideo extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $tags;
    public $file;
    public $thumbnail;
    public bool $myModal = false;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'tags' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function upload()
    {
        $validatedData = $this->validate();

        $validatedData['file'] = $this->file->store('videos', 'public');
        $validatedData['thumbnail'] = $this->thumbnail->store('thumbnails', 'public');

        Video::create($validatedData);

        $this->reset(['title', 'description', 'tags', 'file', 'thumbnail', 'showModal']);

        session()->flash('message', 'Video uploaded successfully.');
    }

    public function render()
    {
        return view('livewire.upload-video');
    }
}