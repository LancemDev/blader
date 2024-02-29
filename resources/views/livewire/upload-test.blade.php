<div>
    <form wire:submit.prevent="upload">
        <x-mary-modal id="modal18" title="Are you sure?"  >
            <x-slot:actions>
                <x-mary-button label="Cancel" onclick="modal18.close()" class="btn-ghost" spinner="save" />
                <x-mary-button label="Upload" class="btn-primary" type="submit" />
            </x-slot:actions>

            <x-mary-input wire:model="title" label="Title" placeholder="Title" />
            <x-mary-input wire:model="description" label="Description" placeholder="Description" />44`
        </x-mary-modal>
    </form>
</div>