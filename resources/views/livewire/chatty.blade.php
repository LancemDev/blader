<div>
    <x-mary-modal id="modal20" title="Chat with maryAI" class="p-5">
        <x-slot:actions>
            <x-mary-button label="Close" onclick="modal20.close()" class="btn-ghost" />
        </x-slot:actions>
        <div>
            <div>{{ $this->message }}</div>
            <div>Messageeee</div>
            <x-mary-input label="Message" placeholder="Type your message here" wire:model="message" />
            <br />
            <x-mary-button label="Send" wire:click="sendMessage" class="btn-primary" />
            @if($this->loading)
                <div>Loading...</div>
            @endif
        </div>

    </x-mary-modal>
</div>