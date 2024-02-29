<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\Filesystem\Media;

class GenerateThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $video;

    /**
     * Create a new job instance.
     */
    public function __construct(Video $video)
    {
        // $this->video = $video;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        FFMpeg::fromDisk('public')
        ->open($this->video->path)
        ->getFrameFromSeconds(0)
        ->export()
        ->toDisk('public')
        ->afterSaving(function ($exporter, Media $media){
            $this->video->update([
                'thumbnail_path' => $media->getPath()
            ]);
        })
        ->save('thumbnails/' . Str::uuid() . '.jpg');
    }
}
