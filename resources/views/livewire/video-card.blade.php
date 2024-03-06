<div class="container">
    @if ($videos->count())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($videos as $video)
                <div class="col rounded overflow-hidden shadow-sm">
                    @if ($video->thumbnail_path)
                        <!-- <img src="storage/app/public/thumbnails/DjgCbznJGTHASP9pAryLBe4SK9izw1Amxmto9dBI.png" class="w-full h-48 object-cover" alt="{{ $video->title }} Thumbnail"> -->
                        <img src="{{ asset('storage/'.$video->thumbnail_path) }}" class="w-full h-48 object-cover" alt="{{ $video->title }} Thumbnail">
                    @else
                        <img src="{{ asset('thumbnails/placeholder.jpg') }}" class="w-full h-48 object-cover" alt="Placeholder Thumbnail">
                    @endif
                    <div class="p-6 bg-white">
                        <h5 class="card-title text-xl font-bold leading-tight">{{ $video->title }}</h5>
                        <p class="card-text text-gray-700">{{ Str::limit($video->description, 100) }}</p>
                        <a href="{{'storage/'. $video->original_file_path }}" target="_blank" class="px-3 py-2 text-white bg-blue-500 hover:bg-blue-700 rounded-md">Watch Video</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No videos found.</div>
    @endif
</div>