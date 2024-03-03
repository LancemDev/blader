<div>
    <x-mary-modal id="modal17">
        <form id="uploadForm" wire:submit="submitForm" action="{{ route('video.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
           <x-mary-file name="thumbnail" accept="image/png" crop-after-change>
                <img src="{{ $user->avatar ?? asset('thumbnails/placeholder.jpg') }}" class="h-40 rounded-lg" />
            </x-mary-file>

           <x-mary-file name="video" label="Receipt" hint="Click to upload video" />

            <x-mary-input  name="title" label="Title" placeholder="Title" />
            <br />
            <x-mary-input  name="description" label="Description" placeholder="Description" />
            <br />
            {{-- <x-mary-input  name="tags" label="Tags" placeholder="Tags" /> --}}
        </form>
        <x-slot:actions>
            <x-mary-button label="Cancel" onclick="modal17.close()" class="btn-ghost" />
            <button type="submit" name="submit" value="Submit" class="btn-ghost rounded" onclick="document.getElementById('uploadForm').submit()">Submit</button>
        </x-slot:actions>
    </x-mary-modal>
</div>