<div>
    <x-mary-form wire:submit.prevent="upload">
        <x-mary-modal id="modal17" title="Are you sure?"  >
            <x-slot:actions>
                <x-mary-button label="Cancel" onclick="modal17.hideModal()" class="btn-ghost" spinner="save" />
                <x-mary-button label="Upload" wire:click="upload" class="btn-primary" type="submit" />
            </x-slot:actions>

            <x-mary-file wire:model="thumbnail" accept="image/png" crop-after-change>
                <img src="{{ asset('thumbnails/placeholder.jpeg') }}" alt="Thumbnail" class="w-full h-48 object-cover" />
            </x-mary-file>
            @error('thumbnail')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <x-mary-file wire:model="file" label="" hint="Only Video" />
            <x-mary-input wire:model="title" label="Title" placeholder="Title" />
            <x-mary-input wire:model="description" label="Description" placeholder="Description" />
            <x-mary-tags wire:model="tags" label="Click ot enter tag(s)" hint="Hint: Hit enter to create a new tag" />
        </x-mary-modal>
    </x-mary-form>

    <x-mary-toast type="success" message="Video uploaded successfully" />
    <x-mary-loading class="text-primary loading-lg" />
</div>