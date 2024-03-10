<div class="container">
    <x-mary-button label="Search" onclick="modal21.showModal()" class="btn-success" />
    <x-mary-modal id="modal21" class="backdrop-blur">
        <x-mary-form wire:submit="getVideosProperty">
            <x-mary-input wire:model="searchQuery" name="search" label="Search" placeholder="Search" />
            <x-slot:actions>
                <x-mary-button label="Search" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
    @if ($videos->count())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($videos as $video)
                <div class="col rounded overflow-hidden shadow-sm border border-gray-200 m-2">
                    @if ($video->thumbnail_path)
                        <!-- Added an ID to the image for JavaScript -->
                        <img src="{{ asset($video->thumbnail_path) }}" class="w-full h-48 object-cover video-thumbnail" alt="{{ $video->title }} Thumbnail" data-video="{{ asset($video->original_file_path) }}">
                    @else
                        <img src="{{ asset('thumbnails/placeholder.jpg') }}" class="w-full h-48 object-cover video-thumbnail" alt="Placeholder Thumbnail">
                    @endif
                     <!-- Like and Dislike buttons -->
                    
                    <div class="col rounded overflow-hidden shadow-sm  ">
                    <div class="p-6">
                        <h5 class="card-title text-xl font-bold leading-tight">{{ $video->title }}</h5>
                        <p class="card-text text-700">{{ Str::limit($video->description, 100) }}</p>
                    </div>
                    <div class="flex justify-between items-center p-4">
                    <button class="like-button" data-video-id="{{ $video->id }}">
    <span class="like-text">Like</span>
</button>
<button class="dislike-button" data-video-id="{{ $video->id }}">
    <span class="dislike-text">Dislike</span>
</button>

                    </div>
                </div>
                </div>
                
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No videos found.</div>
    @endif
</div>

<script>
  // Like button functionality
  document.querySelectorAll('.like-button').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission behavior
            
            var videoId = button.getAttribute('data-video-id');
            console.log('Like button clicked for video ID:', videoId);

            // Check if dislike button is active, if so, deactivate it
            var dislikeButton = document.querySelector('.dislike-button[data-video-id="' + videoId + '"]');
            if (dislikeButton.classList.contains('disliked')) {
                dislikeButton.classList.remove('disliked');
                dislikeButton.querySelector('.dislike-text').textContent = 'Dislike';
                localStorage.removeItem('video_' + videoId); // Remove disliked status from local storage
            }

            // Toggle like class on click
            button.classList.toggle('liked');

            // Toggle like text
            var likeText = button.querySelector('.like-text');
            if (button.classList.contains('liked')) {
                likeText.textContent = 'Liked';
                localStorage.setItem('video_' + videoId, 'liked'); // Store liked status in local storage
            } else {
                likeText.textContent = 'Like';
                localStorage.removeItem('video_' + videoId); // Remove liked status from local storage
            }
        });
    });

    // Dislike button functionality
    document.querySelectorAll('.dislike-button').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission behavior
            
            var videoId = button.getAttribute('data-video-id');
            console.log('Dislike button clicked for video ID:', videoId);

            // Check if like button is active, if so, deactivate it
            var likeButton = document.querySelector('.like-button[data-video-id="' + videoId + '"]');
            if (likeButton.classList.contains('liked')) {
                likeButton.classList.remove('liked');
                likeButton.querySelector('.like-text').textContent = 'Like';
                localStorage.removeItem('video_' + videoId); // Remove liked status from local storage
            }

            // Toggle dislike class on click
            button.classList.toggle('disliked');

            // Toggle dislike text
            var dislikeText = button.querySelector('.dislike-text');
            if (button.classList.contains('disliked')) {
                dislikeText.textContent = 'Disliked';
                localStorage.setItem('video_' + videoId, 'disliked'); // Store disliked status in local storage
            } else {
                dislikeText.textContent = 'Dislike';
                localStorage.removeItem('video_' + videoId); // Remove disliked status from local storage
            }
        });
    });

    // Check local storage for liked/disliked videos on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Iterate through all like buttons
        document.querySelectorAll('.like-button').forEach(function(button) {
            var videoId = button.getAttribute('data-video-id');
            // Check if the video is liked in local storage
            if (localStorage.getItem('video_' + videoId) === 'liked') {
                button.classList.add('liked');
                button.querySelector('.like-text').textContent = 'Liked';
            }
        });

        // Iterate through all dislike buttons
        document.querySelectorAll('.dislike-button').forEach(function(button) {
            var videoId = button.getAttribute('data-video-id');
            // Check if the video is disliked in local storage
            if (localStorage.getItem('video_' + videoId) === 'disliked') {
                button.classList.add('disliked');
                button.querySelector('.dislike-text').textContent = 'Disliked';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var currentlyPlaying = null; // Variable to store the currently playing video

        // Get all video thumbnails
        var thumbnails = document.querySelectorAll('.video-thumbnail');

        // Add click event listener to each thumbnail
        thumbnails.forEach(function(thumbnail) {
            thumbnail.addEventListener('click', function() {
                // Get the video source from the data attribute
                var videoSource = thumbnail.getAttribute('data-video');

                // Check if there is a currently playing video
                if (currentlyPlaying) {
                    // Pause the currently playing video
                    currentlyPlaying.pause();
                }

                // Create a video element dynamically
                var videoElement = document.createElement('video');
                videoElement.setAttribute('controls', true);

                // Create a source element for the video
                var sourceElement = document.createElement('source');
                sourceElement.setAttribute('src', videoSource);
                sourceElement.setAttribute('type', 'video/mp4');

                // Append the source element to the video element
                videoElement.appendChild(sourceElement);

                // Replace the thumbnail with the video element
                thumbnail.parentNode.replaceChild(videoElement, thumbnail);

                // Play the video
                videoElement.play();

                // Set the currently playing video to the new video element
                currentlyPlaying = videoElement;

                // Add an event listener to remove the video element when playback ends
                videoElement.addEventListener('ended', function() {
                    // Create a new thumbnail image element
                    var thumbnailImage = document.createElement('img');
                    thumbnailImage.setAttribute('src', thumbnail.getAttribute('src'));
                    thumbnailImage.setAttribute('class', thumbnail.getAttribute('class'));
                    thumbnailImage.setAttribute('alt', thumbnail.getAttribute('alt'));
                    thumbnailImage.setAttribute('data-video', thumbnail.getAttribute('data-video'));
                });
            });
        });
    });
</script>
