<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;
use App\Livewire\Search;

class VideoCard extends Component
{
    public $searchQuery = '';

    public function like($videoId)
    {
        $video = Video::find($videoId);
        $video->likes++;
        $video->save();
    }   

    public function getVideosProperty()
    {
        if (empty($this->searchQuery)) {
            return Video::all();
        }

        return Video::where('title', 'like', "%{$this->searchQuery}%")
            ->orWhere('description', 'like', "%{$this->searchQuery}%")
            ->orWhere('tags', 'like', "%{$this->searchQuery}%")
            ->get();
    }

    public function render()
    {
        return view('livewire.video-card', ['videos' => $this->videos]);
    }
}