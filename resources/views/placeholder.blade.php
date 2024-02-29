<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- MODALS --}}
    <x-mary-modal id="modal17" title="Upload Video" class="p-5">
        <x-slot:actions>
            <x-mary-button label="Cancel" onclick="modal17.close()" class="btn-ghost" />
            <x-mary-button label="Upload" onclick="" class="btn-primary" />
        </x-slot:actions>
        <x-mary-file wire:model="file" label="" hint="Only Video" />
        <br />
        <x-mary-input wire:model="title" label="Title" placeholder="Title" />
        <br />
        <x-mary-input wire:model="description" label="Description" placeholder="Description" />
        <br />
        <x-mary-tags label="Tags" hint="Hint: Hit enter to create a new tag" />
        <br />
        <x-mary-input label="Video" placeholder="Video" />
    </x-mary-modal>
</div>