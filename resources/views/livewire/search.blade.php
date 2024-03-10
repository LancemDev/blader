<div>
    {{-- Success is as dangerous as failure. --}}
    <x-mary-modal id="modal20" class="backdrop-blur">
        <x-mary-form wire:submit="search">
            <x-mary-input wire:model="searchQuery" name="search" label="Search" placeholder="Search" />
            <x-slot:actions>
                <x-mary-button label="Search" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>
