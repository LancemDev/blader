<?php

namespace App\Livewire\Forms;

use App\Models\Video;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;

class UploadVideoForm extends Form
{
    public $title = '';
    public $description = '';
    public array $tags = [];


    public function submit()
    {
        Video::create([
            'title' => $this->title,
            'description' => $this->description,
            'tags' => $this->tags,
        ]);
        // dd($this->title, $this->description, $this->video, $this->thumbnail, $this->tags, $this->original_file_path, $this->thumbnail_path);
    }

}
