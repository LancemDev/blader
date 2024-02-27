<div>
    <x-mary-modal id="modal17">
        <form wire:submit="save">
            <x-slot:actions>
                <x-mary-button label="Cancel" onclick="modal17.close()" class="btn-ghost" spinner="save" />
                <x-mary-button class="btn-primary" type="submit" >Upload</x-mary-button>
            </x-slot:actions>

            <x-mary-file wire:model="form.thumbnail" accept="image/png" crop-after-change>
                <img src="{{ asset('thumbnails/placeholder.jpeg') }}" alt="Thumbnail" class="w-full h-48 object-cover" />
            </x-mary-file>
            <br />
            <x-mary-file wire:model="form.video" label="" hint="Only Video" />
            <br />
            <x-mary-input wire:model="form.title" label="Title" placeholder="Title" />
            <br />
            <x-mary-input wire:model="form.description" label="Description" placeholder="Description" />
            <br />
            <x-mary-tags wire:model="form.tags" label="Click ot enter tag(s)" hint="Hint: Hit enter to create a new tag" />
            <br />
        </form>
    </x-mary-modal>
</div>