<?php

namespace App\Livewire\Forms;

use App\Models\Video;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;

class UploadVideoForm extends Form
{
    public $photo;
    public $file;
    public $title;
    public $description;
    public array $tags = ['tech', 'gaming', 'art'];


    public function submit()
    {
        // dd($this->title, $this->description, $this->video, $this->thumbnail, $this->tags, $this->original_file_path, $this->thumbnail_path);
    }

}
