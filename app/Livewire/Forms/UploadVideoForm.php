<?php
namespace App\Livewire\Forms;

use App\Models\Video;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Storage; // Import Storage facade
use Mary\Traits\Toast;

class UploadVideoForm extends Form
{
    use Toast;
    public $photo;
    public $file;
    public $title;
    public $description;
    public array $tags = [];

    public function rules(): array
    {
        return [
            'photo' => 'required|image|max:2048', // Add validation for photo
            'file' => 'required|mimetypes:video/mp4,video/quicktime|max:10240', // Add validation for video format and size
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    public function submit()
    {
        $this->validate();
    
        $videoPath = $this->file->store('public/videos'); // Store the video and get the path
        $thumbnailPath = $this->photo->store('public/thumbnails'); // Store the thumbnail and get the path
    
        // Store all the data to the database using the Video model
        $video = Video::create([
            'title' => $this->title,
            'description' => $this->description,
            'original_file_path' => Storage::url($videoPath), //original_file_path Use the stored path for video
            'thumbnail_path' => Storage::url($thumbnailPath), // Use the stored path for thumbnail
            'tags' => implode(',',$this->tags),
            'user_id' => auth()->id(),
        ]);
        // dd($this->all());
    }
    

}
