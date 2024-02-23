<?php

namespace App\Livewire;

use App\Jobs\EncodeVideo;
use App\Jobs\GenerateThumbnail;
use App\Livewire\Forms\UploadVideoForm;
use App\Models\Video;
use App\Models\VideoFormat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Validate;

class UploadVideo extends Component
{
    public $file;
    #[Validate('required', 'max:255')]
    public $title;
    #[Validate('required', 'max:255')]
    public $description;
    public array $tags = [];
    #[On('fileChanged')]
    public $video;
    public bool $loading = false;
    public bool $uploaded = false;

    // Get the original file path

    public function render()
    {
        return view('livewire.upload-video');
    }
}