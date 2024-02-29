<!-- resources/views/livewire/youtube-video-grid.blade.php -->

<div class="grid grid-cols-3 gap-4">
    @foreach($videos as $video)
        <div class="relative">
            <video id="video_{{ $video->id }}" controls class="w-full h-auto cursor-pointer">
            <source src="{{ asset('storage/videos/' . $video->original_file_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <p class="text-center mt-2">{{ $video->title }}</p>
        </div>
    @endforeach
</div>

<script>
    document.addEventListener('livewire:load', function () {
        @foreach($videos as $video)
            document.getElementById('video_{{ $video->id }}').addEventListener('click', function () {
                if (this.paused) {
                    this.play();
                } else {
                    this.pause();
                }
            });
        @endforeach
    });
</script>
