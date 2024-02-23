<div>
    <x-mary-modal id="modal20" title="Chat with Mary" class="p-5">
        <x-slot:actions>
            <x-mary-button label="Close" onclick="modal20.closeModal()" class="btn-ghost" />
        </x-slot:actions>
        <div>
            <p>{{ $this->message }}</p>
            <x-mary-input label="Message" placeholder="Type your message here" wire:model="message" />
            <br />
            <x-mary-button label="Send" wire:click="sendMessage" class="btn-primary" />
            @if($this->loading)
                <div>Loading...</div>
            @endif
        </div>
    </x-mary-modal>
</div>