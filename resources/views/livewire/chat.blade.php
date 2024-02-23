<div>
    <x-mary-modal id="modal20" title="Chat with Mary" class="p-5">
        <x-slot:actions>
            <x-mary-button label="Close" onclick="modal20.closeModal()" class="btn-ghost" />
        </x-slot:actions>
        <div>
        <x-mary-input label="Message" placeholder="Type your message here" wire:model="message" />
        <x-mary-button label="Send" wire:click="sendMessage" class="btn-primary" />
    </x-mary-modal>
</div>