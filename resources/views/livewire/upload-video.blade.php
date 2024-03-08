<div wire:ignore>
    <x-mary-modal id="modal17" class="backdrop-blur">
        <x-mary-form id="uploadForm" wire:submit="submitForm" >
           <x-mary-file wire:model="form.photo" crop-after-change>
                <img src="{{ $user->avatar ?? asset('thumbnails/placeholder.jpg') }}" class="h-40 rounded-lg" />
            </x-mary-file>

           <x-mary-file wire:model="form.file" label="Upload Video" hint="Click to upload video" />

            <x-mary-input wire:model="form.title"  name="title" label="Title" placeholder="Title" />
            <br />
            <x-mary-input wire:model="form.description" name="description" label="Description" placeholder="Description" />
            <br />
            <x-mary-tags wire:model="form.tags" name="tags" label="Click or enter tag(s)" hint="Hint: Hit enter to create a new tag" />
            <br />
            <x-slot:actions>
                <x-mary-button label="Cancel" onclick="modal17.close()" class="btn-ghost" />
                <x-mary-button type="submit" label="Submit" class="btn-primary" />  
        </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>