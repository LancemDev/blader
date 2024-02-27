<?php

namespace App\Livewire\Forms;

use App\Models\Video;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;

class UploadVideoForm extends Form
{
    #[Validate('required')]
    public $title = '';
    #[Validate('required')]
    public $description = '';
    #[Validate('required')]
    public $video;
    public $thumbnail;
    public array $tags = [];
    public $original_file_path = '';
    public $thumbnail_path = '';


    public function submit()
    {
        // Video::create([
        //     'title' => $this->title,
        //     'description' => $this->description,
        //     'thumbnail_path' => $this->thumbnail_path,
        //     'original_file_path' => $this->original_file_path,
        //     'tags' => $this->tags,
        // ]);
        dd($this->title, $this->description, $this->video, $this->thumbnail, $this->tags, $this->original_file_path, $this->thumbnail_path);
    }

}
