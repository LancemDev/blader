<div>
    <x-mary-modal id="modal17" title="Upload Video" class="backdrop-blur" >
        <form id="uploadForm" wire:submit="submitForm" action="{{ route('video.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <x-slot:actions>
                <x-mary-button label="Cancel" onclick="modal17.close()" class="btn-ghost" />
                <button type="submit" name="submit" value="Submit" class="btn-ghost rounded" onclick="document.getElementById('uploadForm').submit()">Submit</button>
           </x-slot:actions>
           <x-mary-file wire:model="photo2" name="thumbnail" accept="image/png" crop-after-change>
                <img src="{{ $user->avatar ?? asset('thumbnails/placeholder.jpeg') }}" class="h-40 rounded-lg" />
            </x-mary-file>

           <x-mary-file wire:model="file" name="video" label="Receipt" hint="Click to upload video" />

            <x-mary-input wire:model="title" name="title" label="Title" placeholder="Title" />
            <br />
            <x-mary-input wire:model="description" name="description" label="Description" placeholder="Description" />
            <br />
            <x-mary-tags wire:model="tags" name="tags" label="Click ot enter tag(s)" hint="Hint: Hit enter to create a new tag" />
            <br />
        </form>
    </x-mary-modal>
</div>



<?php 


public function uploadForm()
    {
        $this->validate([
            'photo2' => 'image|max:1024', // 1MB Max
            'file' => 'mimes:mp4,mov,avi,flv,wmv,3gp,3g2,ts,webm|max:102400', // 100MB Max
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        $this->photo2->store('thumbnails', 'public');
        $this->file->store('videos', 'public');

        Video::create([
            'title' => $this->title,
            'description' => $this->description,
            'tags' => $this->tags,
            'thumbnail' => $this->photo2->hashName(),
            'video' => $this->file->hashName(),
        ]);

        $this->emit('toast', 'Video uploaded successfully');
    }